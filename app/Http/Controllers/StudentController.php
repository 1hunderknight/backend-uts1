<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        if ($students->isNotEmpty()) {
            $response = [
                'message' => 'Menampilkan Data Semua Student',
                'data' => $students,
            ];
            return response()->json($response, 200);
        } else {
            $response = [
                'message' => 'Data tidak ada'
            ];
            return response()->json($response, 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:students',
            'email' => 'required|email|unique:students',
            'jurusan' => 'required',
        ]);

        $student = Student::create($request->all());

        $response = [
            'message' => 'Data Student Berhasil Dibuat',
            'data' => $student,
        ];

        return response()->json($response, 201);
    }

    public function show($id)
    {
        $student = Student::find($id);

        if ($student) {
            $response = [
                'message' => 'Detail student ditemukan',
                'data' => $student
            ];

            return response()->json($response, 200);
        } else {
            $response = [
                'message' => 'Data tidak ditemukan'
            ];

            return response()->json($response, 404);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:students,nim,' . $id,
            'email' => 'required|email|unique:students,email,' . $id,
            'jurusan' => 'required',
        ]);

        $student = Student::find($id);

        if ($student) {
            $student->update($request->all());
            $response = [
                'message' => 'Data Student telah diperbarui',
                'data' => $student
            ];

            return response()->json($response, 200);
        } else {
            $response = [
                'message' => 'Data tidak ditemukan'
            ];

            return response()->json($response, 404);
        }
    }

    public function destroy($id)
    {
        $student = Student::find($id);

        if ($student) {
            $student->delete();
            $response = [
                'message' => 'Data Student telah dihapus'
            ];

            return response()->json($response, 200);
        } else {
            $response = [
                'message' => 'Data tidak ditemukan'
            ];

            return response()->json($response, 404);
        }
    }
}
