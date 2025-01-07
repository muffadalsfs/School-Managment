<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentsResource\Pages;
use App\Models\Students;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\Filter; // Corrected namespace for Filter
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Filament\Notifications\Notification;
class StudentsResource extends Resource
{
    protected static ?string $model = Students::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Student Management';
  protected static ?string $recordTitleAttribute = 'name';
   public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Name'=>$record->name,
            'Standard'=>$record->standard->name,
        ];
    }
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('address')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('country')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('student_id')
                ->required()
                ->maxLength(100),
            Forms\Components\Select::make('gender')
                ->required()
                ->options([
                    'male' => '👦 Male',
                    'female' => '👩 Female',
                ])
                ->label('Gender')
                ->placeholder('Select Gender'),
            Forms\Components\Select::make('standard_id')
                ->required()
                ->relationship('standard', 'name'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('country')
                    ->searchable(),
                Tables\Columns\TextColumn::make('student_id')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('gender')
                    ->searchable(),
                Tables\Columns\TextColumn::make('standard.name')
                    ->searchable(),
            ])
               ->filters([
    Filter::make('start')
        ->query(fn(Builder $query): Builder => $query->where('standard_id', 1)),

    \Filament\Tables\Filters\SelectFilter::make('all_standard') // Fixed syntax and namespace
        ->relationship('standard', 'name') // Correctly reference the 'standard' relationship
        ->label('All Standards'),
])


            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Define relations here if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudents::route('/create'),
            'edit' => Pages\EditStudents::route('/{record}/edit'),
        ];
    }
}
