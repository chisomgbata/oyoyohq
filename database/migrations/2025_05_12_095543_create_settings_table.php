<?php

use App\Models\Setting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->text('value');
            $table->timestamps();
        });

        Setting::create([
            'key' => 'payment',
            'value' => '
<h2> Use this to test the payment </h2>
<span> Bank Name: </span> <strong> Bank of America </strong>
<span> Account Number: </span> <strong> 123456789 </strong>
<span> Account Name: </span> <strong> John Doe </strong>
'
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
