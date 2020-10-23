<div class="form">

    @include('inc.alerts.simple')

    <div class="group">
        <label for="first_name" class="label">
            Your Name
        </label>
        <div class="grid grid-cols-2 gap-2">
            <input type="text" id="first_name" class="input capitalize @error('first_name') border-red-500 @enderror" placeholder="First Name" wire:model.lazy="first_name">
            <input type="text" id="last_name" class="input capitalize @error('last_name') border-red-500 @enderror" placeholder="Last Name" wire:model.lazy="last_name">
        </div>
    </div>

    <div class="group">
        <label for="hire_date" class="label">
            Hire Date
        </label>
        <div id="pickadate"></div>
        <input type="date" id="hire_date" class="input @error('hire_date') border-red-500 @enderror" placeholder="{{date('Y-m-d')}}" wire:model.lazy="hire_date" value="{{date('Y-m-d')}}">
        <div class="text">Your hire date is used to calculate your correct billing rates. Every year employed equals a new higher pay rate. You can find your hire date by visiting your <a href="https://www.firstfleetinc.com/MyPortal.aspx" class="link">FirstFleet&trade; My Portal</a> and clicking <strong>ManageUserProfile</strong></div>
    </div>

    <div class="group">
        <button type="button" class="button primary w-full" wire:click.prevent="submit" wire:loading.attr="hidden">Continue</button>
    </div>

</div>