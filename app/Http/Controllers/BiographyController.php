<?php

namespace App\Http\Controllers;

use App\Models\Biography;
use App\Models\Expertise;
use App\Models\Research;
use App\Models\AboutMe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BiographyController extends Controller
{

    // ======================================================
    // FRONTEND SECTION (6 PAGES)
    // ======================================================

    // HOME PAGE
    public function home()
    {
        $biography = Biography::latest()->first();
        $about = AboutMe::first();
        $expertises = Expertise::latest()->take(6)->get();
        $researches = Research::latest()->take(6)->get();

        return view('frontend.welcome', compact(
            'biography',
            'about',
            'expertises',
            'researches'
        ));
    }

    // ABOUT ME PAGE
    public function aboutMe()
    {
        $about = AboutMe::first();
        return view('frontend.aboutme', compact('about'));
    }

    // BIOGRAPHY PAGE
   public function biography()
{
    $about = Biography::first();
    $biographies = Biography::latest()->get();

    return view('frontend.biography', compact('biographies', 'about'));
}

    // RESEARCH PAGE
    public function research()
    {
        $researches = Research::latest()->get();
        return view('frontend.research', compact('researches'));
    }

    // EXPERTISE PAGE
    public function expertiseFront()
    {
        $expertises = Expertise::latest()->get();
        return view('frontend.expertise', compact('expertises'));
    }

    // CONTACT PAGE
    public function contact()
    {
        return view('frontend.contactme');
    }


    // ======================================================
    // ADMIN SECTION (BIOGRAPHY CRUD)
    // ======================================================
  // ======================================================
// ADMIN SECTION (BIOGRAPHY CRUD)
// ======================================================

// LIST
public function biographies()
{
    $biographies = Biography::latest()->paginate(10);

    return view('backend.biography.index', compact('biographies'));
}

// CREATE PAGE
public function biographycreate()
{
    return view('backend.biography.create');
}

// STORE
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'title' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'email' => 'nullable|email',
        'phone' => 'nullable|string|max:20',
        'years' => 'nullable',
        'type' => 'nullable',
    ]);

    $data = $request->only([
        'name','title','description','email','phone','years','type'
    ]);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('biography', 'public');
    }

    Biography::create($data);

    return redirect()->route('admin.biography.index')
        ->with('success', 'Biography Created Successfully');
}

// EDIT PAGE
public function edit($id)
{
    $biography = Biography::findOrFail($id);

    return view('backend.biography.edit', compact('biography'));
}

// UPDATE
public function update(Request $request, $id)
{
    $biography = Biography::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'title' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'email' => 'nullable|email',
        'phone' => 'nullable|string|max:20',
    ]);

    $data = $request->only([
        'name','title','description','email','phone'
    ]);

    if ($request->hasFile('image')) {

        if ($biography->image && Storage::disk('public')->exists($biography->image)) {
            Storage::disk('public')->delete($biography->image);
        }

        $data['image'] = $request->file('image')->store('biography', 'public');
    }

    $biography->update($data);

    return redirect()->route('admin.biography.index')
        ->with('success', 'Biography Updated Successfully');
}

// DELETE
public function destroy($id)
{
    $biography = Biography::findOrFail($id);

    if ($biography->image && Storage::disk('public')->exists($biography->image)) {
        Storage::disk('public')->delete($biography->image);
    }

    $biography->delete();

    return back()->with('success', 'Deleted Successfully');
}

    // ======================================================
    // ADMIN - EXPERTISE
    // ======================================================

// =====================
// INDEX (LIST)
// =====================
public function expertise()
{
    $expertises = Expertise::with('biography')->latest()->get();

    return view('backend.expertise.index', compact('expertises'));
}



// =====================
// CREATE PAGE
// =====================
public function createExpertise()
{
    $biographies = Biography::all();

    return view('backend.expertise.create', compact('biographies'));
}


// =====================
// STORE
// =====================
public function storeExpertise(Request $request)
{
    $request->validate([
        'biography_id' => 'required|exists:biographies,id',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'experience' => 'required|numeric',
        'type' => 'required|string|max:100',
    ]);

    Expertise::create([
        'biography_id' => $request->biography_id,
        'title' => $request->title,
        'description' => $request->description,
        'experience' => $request->experience,
        'type' => $request->type,
    ]);

    return redirect()->route('admin.expertise.index')
        ->with('success', 'Expertise Created Successfully');
}


// =====================
// EDIT PAGE
// =====================
public function editExpertise($id)
{
    $expertise = Expertise::findOrFail($id);
    $biographies = Biography::all();

    return view('backend.expertise.edit', compact('expertise', 'biographies'));
}


// =====================
// UPDATE
// =====================
public function updateExpertise(Request $request, $id)
{
    $expertise = Expertise::findOrFail($id);

    $request->validate([
        'biography_id' => 'required|exists:biographies,id',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'experience' => 'required|numeric',
        'type' => 'required|string|max:100',
    ]);

    $expertise->update([
        'biography_id' => $request->biography_id,
        'title' => $request->title,
        'description' => $request->description,
        'experience' => $request->experience,
        'type' => $request->type,
    ]);

    return redirect()->route('admin.expertise.index')
        ->with('success', 'Expertise Updated Successfully');
}


// =====================
// DELETE
// =====================
public function deleteExpertise($id)
{
    $expertise = Expertise::findOrFail($id);
    $expertise->delete();

    return back()->with('success', 'Expertise Deleted Successfully');
}

    // ======================================================
    // ADMIN - RESEARCH
    // ======================================================



// =====================
// INDEX (LIST)
// =====================
public function researchAdmin()
{
    $researches = Research::with('biography')->latest()->get();

    return view('backend.research.index', compact('researches'));
}


// =====================
// CREATE PAGE
// =====================
public function createResearch()
{
    $biographies = Biography::all();

    return view('backend.research.create', compact('biographies'));
}


// =====================
// STORE
// =====================
public function storeResearch(Request $request)
{
    $request->validate([
        'biography_id' => 'required|exists:biographies,id',
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'year' => 'required|string|max:20',
    ]);

    Research::create([
        'biography_id' => $request->biography_id,
        'title' => $request->title,
        'description' => $request->description,
        'year' => $request->year,
    ]);

    return redirect()->route('admin.research.index')
        ->with('success', 'Research Created Successfully');
}


// =====================
// EDIT PAGE
// =====================
public function editResearch($id)
{
    $research = Research::findOrFail($id);
    $biographies = Biography::all();

    return view('backend.research.edit', compact('research', 'biographies'));
}


// =====================
// UPDATE
// =====================
public function updateResearch(Request $request, $id)
{
    $research = Research::findOrFail($id);

    $request->validate([
        'biography_id' => 'required|exists:biographies,id',
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'year' => 'required|string|max:20',
    ]);

    $research->update([
        'biography_id' => $request->biography_id,
        'title' => $request->title,
        'description' => $request->description,
        'year' => $request->year,
    ]);

    return redirect()->route('research.index')
        ->with('success', 'Research Updated Successfully');
}


// =====================
// DELETE
// =====================
public function deleteResearch($id)
{
    $research = Research::findOrFail($id);
    $research->delete();

    return back()->with('success', 'Research Deleted Successfully');
}


    // ======================================================
    // ADMIN - ABOUT
    // ======================================================



// =====================
// INDEX
// =====================
public function about()
{
    $about = AboutMe::first();

    return view('backend.aboutme.index', compact('about'));
}


// =====================
// CREATE PAGE
// =====================
public function createAbout()
{
    $biographies = Biography::all();

    return view('backend.aboutme.create', compact('biographies'));
}


// =====================
// STORE
// =====================
public function storeAbout(Request $request)
{
    $request->validate([
        'biography_id' => 'nullable|exists:biographies,id',
        'name' => 'required|string|max:255',
        'title' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'email' => 'nullable|email',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:255',
        'date_of_birth' => 'nullable|date',
        'gender' => 'nullable|string',
        'marital_status' => 'nullable|string',
        'children_count' => 'nullable|integer',
        'blood_group' => 'nullable|string|max:10',
        'donate_blood' => 'nullable|string',
        'facebook' => 'nullable|string',
        'twitter' => 'nullable|string',
        'linkedin' => 'nullable|string',
        'instagram' => 'nullable|string',
        'youtube' => 'nullable|string',
        'website' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $data = $request->only([
        'biography_id',
        'name','title','description',
        'email','phone','address',
        'date_of_birth','gender','marital_status',
        'children_count','blood_group','donate_blood',
        'facebook','twitter','linkedin','instagram','youtube','website'
    ]);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('about', 'public');
    }

    AboutMe::create($data);

    return redirect()->route('about')->with('success', 'About Created Successfully');
}


// =====================
// EDIT
// =====================
public function editAbout()
{
    $about = AboutMe::first();
    $biographies = Biography::all();

    return view('backend.aboutme.edit', compact('about','biographies'));
}


// =====================
// UPDATE
// =====================
public function updateAbout(Request $request)
{
    $about = AboutMe::first();

    if (!$about) {
        return back()->with('error', 'No About Found');
    }

    $request->validate([
        'biography_id' => 'nullable|exists:biographies,id',
        'name' => 'required|string|max:255',
        'title' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'email' => 'nullable|email',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:255',
        'date_of_birth' => 'nullable|date',
        'gender' => 'nullable|string',
        'marital_status' => 'nullable|string',
        'children_count' => 'nullable|integer',
        'blood_group' => 'nullable|string|max:10',
        'donate_blood' => 'nullable|string',
        'facebook' => 'nullable|string',
        'twitter' => 'nullable|string',
        'linkedin' => 'nullable|string',
        'instagram' => 'nullable|string',
        'youtube' => 'nullable|string',
        'website' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $data = $request->only([
        'biography_id',
        'name','title','description',
        'email','phone','address',
        'date_of_birth','gender','marital_status',
        'children_count','blood_group','donate_blood',
        'facebook','twitter','linkedin','instagram','youtube','website'
    ]);

    if ($request->hasFile('image')) {

        if ($about->image && Storage::disk('public')->exists($about->image)) {
            Storage::disk('public')->delete($about->image);
        }

        $data['image'] = $request->file('image')->store('about', 'public');
    }

    $about->update($data);

    return redirect()->route('about')->with('success', 'About Updated Successfully');
}


// =====================
// DELETE
// =====================
public function deleteAbout()
{
    $about = AboutMe::first();

    if ($about) {

        if ($about->image && Storage::disk('public')->exists($about->image)) {
            Storage::disk('public')->delete($about->image);
        }

        $about->delete();
    }

    return back()->with('success', 'About Deleted Successfully');
}
}