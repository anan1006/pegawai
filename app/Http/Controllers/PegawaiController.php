<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\PegawaiDataTable;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{

    // Rules Validation
    protected $messages = [
        'required' => ':attribute wajib diisi.',
        'string' => ':attribute harus berupa teks.',
        'max' => ':attribute tidak boleh lebih dari :max karakter.',
        'digits_between' => ':attribute harus antara :min dan :max digit.',
        'email' => ':attribute harus berupa alamat email yang valid.',
        'date' => ':attribute harus berupa tanggal yang valid.',
        'image' => ':attribute harus berupa file gambar.',
        'mimes' => ':attribute harus berupa file dengan tipe: :values.',
        'max' => ':attribute tidak boleh lebih dari :max kilobyte.',
        'in' => ':attribute harus salah satu dari: :values.',
    ];
    protected $attributes = [
        'nama_pegawai' => 'Nama Pegawai',
        'alamat' => 'Alamat Pegawai',
        'telepon' => 'Nomor Telepon Pegawai',
        'email' => 'Email Pegawai',
        'tanggal_lahir' => 'Tanggal Lahir Pegawai',
        'foto' => 'Foto Pegawai',
        'jenis_kelamin' => 'Jenis Kelamin Pegawai',
        'posisi' => 'Posisi Pegawai',
        'status' => 'Status Kepegawaian',
        'tanggal_bergabung' => 'Tanggal Bergabung Pegawai',
        'gaji' => 'Gaji Pegawai',
    ];
    protected $validasi = [
        'nama_pegawai' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'telepon' => 'required|digits_between:10,15',
        'email' => 'required|email|max:255',
        'tanggal_lahir' => 'required|date',
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:3072',
        'jenis_kelamin' => 'required|in:laki-laki,perempuan',
        'posisi' => 'required|in:manager,koki,pelayan,kasir,cleaning service',
        'status' => 'required|in:tetap,kontrak,magang',
        'tanggal_bergabung' => 'required|date',
        'gaji' => 'required|numeric|min:0',
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(PegawaiDataTable $dataTable)
    {
        return $dataTable->render("pages.pegawai.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate($this->validasi, $this->messages, $this->attributes);
        $validatedData["id_pegawai"] = Str::uuid();
        $validatedData["created_at"] = now();
        try {
            // Menyimpan file foto
            if ($request->hasFile('foto')) {
                $validatedData['foto'] = $request->file('foto')->store('foto_pegawai','public');
            }
            // Menyimpan data ke tabel pegawais
            DB::table('pegawais')->insert($validatedData);

            return redirect()->route('pegawai.index')->with("success","Pegawai berhasil ditambahkan.");

        } catch (\Throwable $th) {
            return redirect()->route('pegawai.index')->with("error","Pegawai gagal ditambahkan.");
            // dd($th);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        return view("pages.pegawai.show",compact("pegawai"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        return view("pages.pegawai.edit",compact("pegawai"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $this->validasi['foto']='image|mimes:jpeg,png,jpg,gif|max:3072';
        $validatedData = $request->validate($this->validasi, $this->messages, $this->attributes);
        $validatedData["updated_at"] = now();

        try {
            // Menghapus file foto lama jika ada foto baru diupload
            if ($request->hasFile('foto')) {
                Storage::disk('public')->delete($pegawai->foto);
                $validatedData['foto'] = $request->file('foto')->store('foto_pegawai', 'public');
            }

            DB::table('pegawais')->where('id_pegawai', $pegawai->id_pegawai)->update($validatedData);
            return redirect()->route('pegawai.index')->with("success", "Pegawai berhasil diperbarui.");


        } catch (\Throwable $th) {
            dd($th);
            return redirect()->route('pegawai.index')->with("error", "Pegawai gagal diperbarui.");
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        try {
            Storage::disk('public')->delete($pegawai->foto);
            $pegawai->delete();
            return redirect()->route('pegawai.index')->with("success", "Pegawai berhasil Dihapus.");
        } catch (\Throwable $th) {
            return redirect()->route('pegawai.index')->with("error", "Pegawai gagal Dihapus.");

        }

    }
}
