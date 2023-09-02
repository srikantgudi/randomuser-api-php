<?php

namespace App\Livewire;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Layout;
use Livewire\Component;
use SimpleXMLElement;

#[Layout('layout.app')]
class Randomuser extends Component
{
    public $users = [];

    public function mount() {
        $this->getData();
    }

    /**
     * function to get data
     */
    private function getData() {
        for ($i=0; $i < 10; $i++) {
            $response = Http::get('https://randomuser.me/api/');
            $this->users[] = json_decode($response->body())->results[0];
        }
        /**
         * sort on last name in descending order
         */
        usort($this->users, function($a, $b) {
            if ($a->name->last == $b->name->last) {
                return 0;
            }
            return $a->name->last > $b->name->last ? -1 : 1;
        });
    }


    public function render()
    {
        return view('livewire.randomuser');
    }

    /**
     * function to convert data to xml
     */
    public function toxml() {
        $xml = new SimpleXMLElement('<user />');

        foreach ($this->users as $u) {
            $user = $xml->addChild('user');
            $user->addChild("title", $u->name->title);
            $user->addChild("first", $u->name->first);
            $user->addChild("last", $u->name->last);
            $user->addChild("phone", $u->phone);
            $user->addChild("email", $u->email);
            $user->addChild("country", $u->location->country);
        }
        $fileName = "users-" . date('YjHi'). ".xml";
        $xml->saveXML($fileName);

        return response()->download($fileName);
    }
}
