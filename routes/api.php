<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Type;
use App\Models\User;
use App\Models\Project;
use App\Models\Social;
use App\Models\Educational;
use App\Models\Skill;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/types', function () {

    $types = Type::orderBy('title')->get();
    return $types;
});

// Route::get('/projects', function () {

//     $projects = Project::orderBy('created_at')->get();

//     foreach ($projects as $key => $project) {
//         $projects[$key]['user'] = User::where('id', $project['user_id'])->first();
//         $projects[$key]['type'] = Type::where('id', $project['type_id'])->first();

//         if ($project['image']) {
//             $projects[$key]['image'] = env('APP_URL') . 'storage/' . $project['image'];
//         }
//     }

//     return $projects;
// });

// Route::get('/projects/profile/{project?}', function (Project $project) {

//     $project['user'] = User::where('id', $project['user_id'])->first();
//     $project['type'] = Type::where('id', $project['type_id'])->first();

//     if ($project['image']) {
//         $project['image'] = env('APP_URL') . 'storage/' . $project['image'];
//     }

//     return $project;
// });


Route::get('/education', function () {

    $qualifications = Educational::orderBy('id')->get();

    return $qualifications;
});
// http://127.0.0.1:8000/api/skills
Route::get('/skills', function () {

    $skills = response()->json([
        0 => [
            'id' => 1,
            'title' => 'Javascript',
            'years' => '5',
            'set' => [
                0 => [
                    'id' => 1,
                    'title' => 'React',
                ],
                1 => [
                    'id' => 2,
                    'title' => 'Next',
                ],
                2 => [
                    'id' => 3,
                    'title' => 'Typescript',
                ],
                3 => [
                    'id' => 4,
                    'title' => 'Node',
                ],
            ],

        ],
        1 => [
            'id' => 2,
            'title' => 'HTML/CSS',
            'set' => [
                0 => [
                    'id' => 1,
                    'title' => 'Bootstrap',
                ],
                1 => [
                    'id' => 2,
                    'title' => 'HTML5',
                ],
                2 => [
                    'id' => 3,
                    'title' => 'CSS3',
                ],
            ],
        ],
    ]);

    return $skills;
});
// http://127.0.0.1:8000/api/socialmedia
Route::get('/socialmedia', function () {

    // $socialmedia = Social::orderBy('id')->get();

    // return $socialmedia;
    $collection = response()->json([
        0 => [
            'id'  => 1,
            'title' => 'Github',
            'url' => 'https://github.com/santhinisj',
            'icon' => 'fab fa-facebook-f',
            'color' => '#3b5998'
        ],
        1 => [
            'id' => 2,
            'title' => 'Linkedin',
            'url' => 'https://www.linkedin.com/in/santhinisj/',
            'icon' => 'fab fa-twitter',
            'color' => '#1da1f2'
        ],
        [
            'id' => 3,
            'title' => 'Resume',
            'url' => 'https://docs.google.com/document/d/0B68AkqlZF8f_eUtNdzFqSEtRWk0/edit?usp=sharing&ouid=112504894150743678195&resourcekey=0-0_9wAKcGeR_5sFyaJwdW4Q&rtpof=true&sd=true',
            'icon' => 'fab fa-instagram',
            'color' => '#e1306c'
        ],
        [
            'id' => 4,
            'title' => 'Get in touch',
            'url' => 'santhi.code@gmail.com',
            'icon' => 'fab fa-linkedin-in',
            'color' => '#0077b5'
        ]
    ]);

    return $collection;
});


Route::get(`/projects`, function () {
    $projects = response()->json([
        0 => [
            'id'  => 1,
            'title' => 'Netflix Clone',
            'image' => 'https://res.cloudinary.com/dtgy66fxw/image/upload/v1660320830/netflix_mdbwgl.png',
            'desc' => 'A React application that allows users to search for movies and shows.',
            'lang' => 'React',
        ],
        1 => [
            'id' => 2,
            'title' => 'Affogato',
            'image' => 'https://res.cloudinary.com/dtgy66fxw/image/upload/v1660320830/affogatp_wybgcr.png',
            'desc' => 'A bistro application that allows users to search for different dishes',
            'lang' => `HTML/CSS + Javascript`,
        ]
    ]);
    return $projects;
});
