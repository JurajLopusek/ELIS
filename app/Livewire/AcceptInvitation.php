<?php

namespace App\Livewire;

use App\Models\Partners;
use Filament\Pages\Dashboard;
use Livewire\Component;
use App\Models\Invitation;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Pages\SimplePage;
use Illuminate\Validation\Rules\Password;
use Filament\Forms;


class AcceptInvitation extends SimplePage
{
    use InteractsWithForms;
    use InteractsWithFormActions;

    protected static string $view = 'livewire.accept-invitation';
    public int $invitation;
    private Invitation $invitationModel;

    public ?array $data = [];

    public function mount(): void
    {
        $this->invitationModel = Invitation::findOrFail($this->invitation);
        $this->form->fill([
            'email' => $this->invitationModel->email
        ]);

    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Profile information')
                    ->description('Put the profile information here')
                    ->schema([

                        TextInput::make('name')
                            ->label(__('filament-panels::pages/auth/register.form.name.label'))
                            ->required()
                            ->maxLength(255)
                            ->autofocus(),
                        TextInput::make('email')
                            ->label(__('filament-panels::pages/auth/register.form.email.label'))
                            ->disabled(),
                        TextInput::make('password')
                            ->label(__('filament-panels::pages/auth/register.form.password.label'))
                            ->password()
                            ->required()
                            ->rule(Password::default())
                            ->same('passwordConfirmation')
                            ->validationAttribute(__('filament-panels::pages/auth/register.form.password.validation_attribute')),
                        TextInput::make('passwordConfirmation')
                            ->label(__('filament-panels::pages/auth/register.form.password_confirmation.label'))
                            ->password()
                            ->required()
                            ->dehydrated(false),
                    ]),
                Forms\Components\Section::make('Company information')
                    ->description('Put the company information here')
                    ->schema([
                        TextInput::make('ico')
                            ->label('ICO')
                            ->required()
                            ->numeric(),
                        TextInput::make('company_name')
                            ->label('Company name')
                            ->required(),
                        TextInput::make('dic')
                            ->label('DIC')
                            ->required()
                            ->numeric(),
                        TextInput::make('address')
                            ->label('Address')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('city')
                            ->label('City')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('postal_code')
                            ->label('Postal Code')
                            ->required()
                            ->numeric(),
                    ])->columns(1),
            ])->statePath('data');
    }

    public function create(): void
    {
        $this->invitationModel = Invitation::find($this->invitation);

        $user = User::create([
            'name' => $this->form->getState()['name'],
            'password' => $this->form->getState()['password'],
            'email' => $this->invitationModel->email,
        ]);
        Partners::create([
            'user_id' => $user->id,
            'ico' => $this->form->getState()['ico'],
            'company_name' => $this->form->getState()['company_name'],
            'dic' => $this->form->getState()['dic'],
            'address' => $this->form->getState()['address'],
            'city' => $this->form->getState()['city'],
            'postal_code' => $this->form->getState()['postal_code'],
        ]);
        auth()->login($user);

        $this->invitationModel->delete();
        $this->redirect(Dashboard::getUrl());

    }

    /**
     * @return array<Action | ActionGroup>
     */
    protected function getFormActions(): array
    {
        return [
            $this->getRegisterFormAction(),
        ];
    }

    public function getRegisterFormAction(): Action
    {
        return Action::make('register')
            ->label(__('filament-panels::pages/auth/register.form.actions.register.label'))
            ->submit('register');
    }

    public function getHeading(): string
    {
        return 'Accept Invitation';
    }

    public function hasLogo(): bool
    {
        return false;
    }

    public function getSubHeading(): string
    {
        return 'Create your user to accept an invitation';
    }
}
