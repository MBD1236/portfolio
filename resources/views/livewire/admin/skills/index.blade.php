<div class="space-y-6">

    <!-- HEADER + BREADCRUMBS -->
    <div class="flex justify-between items-center pb-2">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">
            Compétence
        </h2>

        <div class="p-3 bg-neutral-secondary-medium border border-default-medium rounded-base">
            <flux:breadcrumbs>
                <flux:breadcrumbs.item href="{{ route('dashboard') }}">
                    Dashboard
                </flux:breadcrumbs.item>
                <flux:breadcrumbs.item>
                    Compétence
                </flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </div>
    </div>


    @if(session()->has('success'))
    <div class="flex justify-center">
        <div id="toast-success"
            class="flex items-center w-full max-w-sm p-4 text-body bg-neutral-primary-soft rounded-base shadow-xs border border-default"
            role="alert">
            <div
                class="inline-flex items-center justify-center shrink-0 w-7 h-7 text-fg-success bg-success-soft rounded">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 11.917 9.724 16.5 19 7.5" />
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
            <button type="button"
                class="ms-auto flex items-center justify-center text-body hover:text-heading bg-transparent box-border border border-transparent hover:bg-neutral-secondary-medium focus:ring-4 focus:ring-neutral-tertiary font-medium leading-5 rounded text-sm h-8 w-8 focus:outline-none"
                data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18 17.94 6M18 18 6.06 6" />
                </svg>
            </button>
        </div>
    </div>
    @endif
    @if (session()->has('danger'))
    <div class="flex justify-center">
        <div id="toast-danger"
            class="flex items-center w-full max-w-sm p-4 text-body bg-neutral-primary-soft rounded-base shadow-xs border border-default"
            role="alert">
            <div class="inline-flex items-center justify-center shrink-0 w-7 h-7 text-fg-danger bg-danger-soft rounded">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18 17.94 6M18 18 6.06 6" />
                </svg>
                <span class="sr-only">Error icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ session('danger') }}</div>
            <button type="button"
                class="ms-auto flex items-center justify-center text-body hover:text-heading bg-transparent box-border border border-transparent hover:bg-neutral-secondary-medium focus:ring-4 focus:ring-neutral-tertiary font-medium leading-5 rounded text-sm h-8 w-8 focus:outline-none"
                data-dismiss-target="#toast-danger" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18 17.94 6M18 18 6.06 6" />
                </svg>
            </button>
        </div>

    </div>
    @endif


    <div class="flex justify-between items-center">
        <div>
            <flux:input placeholder="Rechercher…" wire:model.live="search" class="w-64" />
        </div>

        <flux:modal.trigger name="ajout-competence">
            <flux:button icon="plus" wire:click='resetForm'>Ajouter une compétence</flux:button>
        </flux:modal.trigger>
    </div>



    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
        <table class="w-full text-sm text-left rtl:text-right text-body">
            <thead class="text-sm text-body bg-neutral-secondary-medium border-b border-default-medium">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Nom
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Niveau
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Categorie
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($competences as $competence)
                <tr
                    class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">

                    <th scope="row" class="px-6 py-2 font-medium text-heading whitespace-nowrap">
                        {{ $competence->name }}
                    </th>

                    <td class="px-6 py-2">
                        {{ $competence->level }} / 100
                    </td>

                    <td class="px-6 py-2">
                        {{ $competence->category->name }}
                    </td>

                    <td class="px-6 py-2 flex justify-start gap-1">
                        <flux:modal.trigger name="editer-competence">
                            <flux:button icon="pencil-square" size="sm" wire:click="edit({{ $competence }})" />
                        </flux:modal.trigger>
                        <flux:button icon="trash" size="sm" wire:click="delete({{ $competence->id }})" />
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-4 text-center text-gray-500 dark:text-gray-300">
                        Aucune compétence enregistrée.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>





    <flux:modal name="ajout-competence" class="md:w-150" wire:ignore.self>
        <form wire:submit="save" class="space-y-6">
            <div>
                <flux:heading size="lg">Ajouter une compétence</flux:heading>
            </div>
            <flux:input wire:model='name' label="Nom" placeholder="Nom" />
            <flux:input wire:model='level' label="Niveau" placeholder="Niveau" />
            <flux:select wire:model='category_id' label="Catégorie">
                @foreach ($categories as $categorie)
                <flux:select.option value="0"> Choisir une catégorie </flux:select.option>
                <flux:select.option wire:key='{{ $categorie->id }}' value="{{ $categorie->id }}"> {{ $categorie->name }} </flux:select.option>
                @endforeach
            </flux:select>

            <div class="flex">
                <flux:spacer />
                <flux:button type="submit" variant="primary">Ajouter</flux:button>
            </div>
        </form>
    </flux:modal>
    <flux:modal name="editer-competence" class="md:w-150" wire:ignore.self>
        <form wire:submit="update" class="space-y-6">
            <div>
                <flux:heading size="lg">Editer une compétence</flux:heading>
            </div>
            <flux:input wire:model='name' label="Nom" placeholder="Nom" />
            <flux:input wire:model='level' label="Niveau" placeholder="Niveau" />
            <flux:select wire:model='category_id'>
                @foreach ($categories as $categorie)
                <flux:select.option value="0"> Choisir une catégorie </flux:select.option>
                <flux:select.option wire:key='{{ $categorie->id }}' value="{{ $categorie->id }}"> {{ $categorie->name }} </flux:select.option>
                @endforeach
            </flux:select>
            <div class="flex">
                <flux:spacer />
                <flux:button type="submit" variant="primary">Editer</flux:button>
            </div>
        </form>
    </flux:modal>

</div>