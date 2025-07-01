<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function index(): View
    {
        $judul = 'User';
        $data = User::all();
        return view('dashboard.user.index', compact('judul', 'data'));
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'tipe' => 'required|string',
        ]);

        $data = User::create($input);
        if (!$data[0]) {
            return redirect('dashboard/user')->with('gagal', $data[1]);
        }
        return redirect('dashboard/user')->with('berhasil', "Data berhasil disimpan!");
    }

    public function edit(User $id)
    {
        return $id;
    }

    public function update(Request $request, $id)
    {
        $data = User::findOrFail($id);

        $input = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => "sometimes|required|email|unique:users,email,$id",
            'password' => 'nullable|string|min:6',
            'tipe' => 'required|string',
        ]);

        if (empty($input['password'])) {
            unset($input['password']);
        }

        $data->update($input);

        if (!$data[0]) {
            return redirect('dashboard/user')->with('gagal', $data[1]);
        }
        return redirect('dashboard/user')->with('berhasil', "Data berhasil diperbarui!");
    }

    public function destroy(User $id)
    {
        try {
            $id->delete();
            return response()->json(['message' => 'Data berhasil dihapus!'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus data'], 500);
        }
    }
}
