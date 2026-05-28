<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // We will keep the columns as they are (string/text) but update the data to be JSON
        $projects = \Illuminate\Support\Facades\DB::table('projects')->get();
        foreach ($projects as $project) {
            \Illuminate\Support\Facades\DB::table('projects')->where('id', $project->id)->update([
                'title' => json_encode(['en' => $project->title, 'id' => $project->title, 'ja' => $project->title]),
                'description' => json_encode(['en' => $project->description, 'id' => $project->description, 'ja' => $project->description]),
                'category' => json_encode(['en' => $project->category, 'id' => $project->category, 'ja' => $project->category]),
                'challenge' => $project->challenge ? json_encode(['en' => $project->challenge, 'id' => $project->challenge, 'ja' => $project->challenge]) : null,
                'solution' => $project->solution ? json_encode(['en' => $project->solution, 'id' => $project->solution, 'ja' => $project->solution]) : null,
                'result' => $project->result ? json_encode(['en' => $project->result, 'id' => $project->result, 'ja' => $project->result]) : null,
                'features' => $project->features ? json_encode(['en' => $project->features, 'id' => $project->features, 'ja' => $project->features]) : null,
            ]);
        }
        
        // Now change columns to text to hold larger JSON strings safely
        Schema::table('projects', function (Blueprint $table) {
            $table->text('title')->change();
            $table->text('category')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $projects = \Illuminate\Support\Facades\DB::table('projects')->get();
        foreach ($projects as $project) {
            $title = json_decode($project->title, true)['en'] ?? $project->title;
            $description = json_decode($project->description, true)['en'] ?? $project->description;
            $category = json_decode($project->category, true)['en'] ?? $project->category;
            $challenge = $project->challenge ? (json_decode($project->challenge, true)['en'] ?? $project->challenge) : null;
            $solution = $project->solution ? (json_decode($project->solution, true)['en'] ?? $project->solution) : null;
            $result = $project->result ? (json_decode($project->result, true)['en'] ?? $project->result) : null;
            $features = $project->features ? (json_decode($project->features, true)['en'] ?? $project->features) : null;

            \Illuminate\Support\Facades\DB::table('projects')->where('id', $project->id)->update([
                'title' => $title,
                'description' => $description,
                'category' => $category,
                'challenge' => $challenge,
                'solution' => $solution,
                'result' => $result,
                'features' => $features,
            ]);
        }

        Schema::table('projects', function (Blueprint $table) {
            $table->string('title')->change();
            $table->string('category')->change();
        });
    }
};
