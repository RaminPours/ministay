<?php
namespace App\Http\Controllers;
use App\Models\Property;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
class PropertyController extends Controller {
 public function index(Request $request): View {
  $filters=$request->validate(['city'=>['nullable','string','max:100'],'guests'=>['nullable','integer','min:1'],'starts_at'=>['nullable','date'],'ends_at'=>['nullable','date','after:starts_at']]);
  $properties=Property::query();
  if (!empty($filters['city'])) $properties->where('stad','like','%'.$filters['city'].'%');
  if (!empty($filters['guests'])) $properties->where('aantal_bedden','>=',$filters['guests']);
  if (!empty($filters['starts_at']) && !empty($filters['ends_at'])) $properties->whereDoesntHave('bookings',fn($b)=>$b->where('status','!=','cancelled')->where('starts_at','<',$filters['ends_at'])->where('ends_at','>',$filters['starts_at']));
  return view('properties.index',['properties'=>$properties->latest()->get()]);
 }
 public function show(Property $property): View { return view('properties.show',compact('property')); }
 public function create(): View { return view('properties.create'); }
 public function store(Request $request): RedirectResponse {
  $data=$request->validate(['titel'=>['required','string','max:120'],'beschrijving'=>['required','string','max:2000'],'stad'=>['required','string','max:100'],'prijs_per_nacht'=>['required','numeric','min:1'],'aantal_slaapkamers'=>['required','integer','min:0'],'aantal_bedden'=>['required','integer','min:1'],'aantal_badkamers'=>['required','integer','min:0'],'image'=>['nullable','image','max:5120']]);
  if($request->hasFile('image')) $data['image_path']=$request->file('image')->store('properties','public');
  unset($data['image']); $property=$request->user()->properties()->create($data);
  return redirect()->route('properties.show',$property)->with('status','Je woning is toegevoegd.');
 }
 public function destroy(Request $request, Property $property): RedirectResponse {
  abort_unless($request->user()->is_admin,403);
  if($property->image_path) Storage::disk('public')->delete($property->image_path);
  $property->delete();
  return redirect()->route('properties.index')->with('status','De woning is verwijderd.');
 }
}