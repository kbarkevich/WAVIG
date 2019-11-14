<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CreateWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('words', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('text');
            $table->boolean("y_suffix");
        });

        $client = new Client();

        $res = $client->get(config('services.words.noun_txt_url'));
        $nounstring = $res->getBody()->getContents();
        $noun = strtok($nounstring, "\n");
        $nouns = [];
        while ($noun !== false)
        {
            array_push($nouns, $noun);
            $noun = strtok("\n");
        }

        $res = $client->get(config('services.words.adj_txt_url'));
        $adjstring = $res->getBody()->getContents();
        $adj = strtok($adjstring, "\n");
        $adjs = [];
        while ($adj !== false)
        {
            array_push($adjs, $adj);
            $adj = strtok("\n");
        }
        
        foreach ($nouns as $noun)
        {
            DB::table('words')->insert(
                [
                    "text" => $noun,
                    "y_suffix" => true,
                ]
            );
        }
        foreach ($adjs as $adj)
        {
            DB::table('words')->insert(
                [
                    "text" => $adj,
                    "y_suffix" => false,
                ]
            );
        }
        


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('words');
    }
}
