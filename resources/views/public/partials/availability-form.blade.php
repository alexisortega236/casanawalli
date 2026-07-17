@inject('copy', 'App\Services\Localization\LocalizedContent')

<form method="POST" action="{{ route('public.availability.store', ['locale' => app()->getLocale()]) }}" class="grid gap-5">
    @csrf
    @if (session('status'))
        <p class="bg-nawalli-aqua px-5 py-4 font-semibold text-nawalli-navy">{{ session('status') }}</p>
    @endif
    <label class="grid gap-2 font-semibold">Name
        <input class="border border-nawalli-sand px-4 py-3 font-normal" name="name" value="{{ old('name') }}" required>
        @error('name') <span class="text-sm text-red-700">{{ $message }}</span> @enderror
    </label>
    <div class="grid gap-5 md:grid-cols-2">
        <label class="grid gap-2 font-semibold">Email
            <input class="border border-nawalli-sand px-4 py-3 font-normal" type="email" name="email" value="{{ old('email') }}" required>
            @error('email') <span class="text-sm text-red-700">{{ $message }}</span> @enderror
        </label>
        <label class="grid gap-2 font-semibold">Phone
            <input class="border border-nawalli-sand px-4 py-3 font-normal" name="phone" value="{{ old('phone') }}">
        </label>
    </div>
    <div class="grid gap-5 md:grid-cols-3">
        <label class="grid gap-2 font-semibold">Arrival
            <input class="border border-nawalli-sand px-4 py-3 font-normal" type="date" name="arrival_date" value="{{ old('arrival_date') }}" required>
            @error('arrival_date') <span class="text-sm text-red-700">{{ $message }}</span> @enderror
        </label>
        <label class="grid gap-2 font-semibold">Departure
            <input class="border border-nawalli-sand px-4 py-3 font-normal" type="date" name="departure_date" value="{{ old('departure_date') }}" required>
            @error('departure_date') <span class="text-sm text-red-700">{{ $message }}</span> @enderror
        </label>
        <label class="grid gap-2 font-semibold">Guests
            <input class="border border-nawalli-sand px-4 py-3 font-normal" type="number" min="1" max="4" name="guests" value="{{ old('guests', 2) }}" required>
        </label>
    </div>
    <label class="grid gap-2 font-semibold">Suite preference
        <select class="border border-nawalli-sand px-4 py-3 font-normal" name="room_id">
            <option value="">No preference</option>
            @foreach ($rooms as $room)
                <option value="{{ $room->id }}" @selected((string) old('room_id', $selectedRoom?->id) === (string) $room->id)>{{ $copy->get($room, 'name') }}</option>
            @endforeach
        </select>
    </label>
    <label class="grid gap-2 font-semibold">Message
        <textarea class="min-h-36 border border-nawalli-sand px-4 py-3 font-normal" name="message">{{ old('message') }}</textarea>
    </label>
    <button class="bg-nawalli-navy px-7 py-4 font-bold text-white" type="submit">Send request</button>
</form>
