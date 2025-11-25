<?php

use App\Livewire\Admin\About\Index as AboutIndex;
use App\Livewire\Admin\Categories\Index as CategoryIndex;
use App\Livewire\Admin\Certifications\Index as CertificationIndex;
use App\Livewire\Admin\Contacts\Index as ContactIndex;
use App\Livewire\Admin\Education\Index as EducationIndex;
use App\Livewire\Admin\Experience\Index as ExperienceIndex;
use App\Livewire\Admin\Projects\Index as ProjectIndex;
use App\Livewire\Admin\Skills\Index as SkillIndex;
use App\Livewire\Admin\Technologies\Index as TechnologyIndex;
use App\Livewire\Portfolio\Index;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;




// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::prefix('/admin')->name('admin.')->group(function() {
    Route::get('/about', AboutIndex::class)->name('about.index');
    Route::get('/experience', ExperienceIndex::class)->name('experience.index');
    Route::get('/education', EducationIndex::class)->name('education.index');
    Route::get('/categories', CategoryIndex::class)->name('categories.index');
    Route::get('/skills', SkillIndex::class)->name('skills.index');
    Route::get('/projects', ProjectIndex::class)->name('projects.index');
    Route::get('/certifications', CertificationIndex::class)->name('certifications.index');
    Route::get('/contacts', ContactIndex::class)->name('contacts.index');
    Route::get('/technologies', TechnologyIndex::class)->name('technologies.index');

});


Route::get('/', Index::class)->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});
