<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    private $animals = ['kucing', 'ayam', 'ikan'];

    public function index()
    {
        #GET Request
        echo "#GET Request<br>";
        echo "Menampilkan data animals<br>";
        $this->displayAnimals();
    }

    public function store(Request $request)
    {
        #POST Request
        echo "#POST Request<br>";
        echo "Menambahkan hewan baru<br>";
        $newAnimal = $request->input('animal');
        array_push($this->animals, $newAnimal);
        $this->displayAnimals();
    }

    public function update(Request $request, $id)
    {
        #PUT Request
        echo "#PUT Request<br>";
        echo "Mengupdate data hewan id $id<br>";
        $updatedAnimal = $request->input('animal');
        if (isset($this->animals[$id - 1])) {
            $this->animals[$id - 1] = $updatedAnimal;
        }
        $this->displayAnimals();
    }

    public function destroy($id)
    {
        #DELETE Request
        echo "#DELETE Request<br>";
        echo "Menghapus data hewan id $id<br>";
        if (isset($this->animals[$id - 1])) {
            unset($this->animals[$id - 1]);
            $this->animals = array_values($this->animals);
        }
        $this->displayAnimals();
    }

    private function displayAnimals()
    {
        echo "Menampilkan data animals<br>";
        foreach ($this->animals as $animal) {
            echo "-$animal<br>";
        }
    }
}
