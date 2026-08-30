<?php
namespace App\Http\Controllers;
use App\Models\Puja; use Illuminate\Http\Request;
class PujaController extends Controller { public function index(Request $request) { $pujas=Puja::with('category')->when($request->search,fn($q,$s)=>$q->where('name','like',"%{$s}%"))->when($request->category,fn($q,$c)=>$q->whereHas('category',fn($x)=>$x->where('slug',$c)))->paginate(12)->withQueryString(); return view('pujas.index',compact('pujas')); } public function show(Puja $puja) { $puja->load(['category','slots'=>fn($q)=>$q->whereDate('slot_date','>=',today())->where('is_active',true)->orderBy('slot_date')]); return view('pujas.show',compact('puja')); } }
