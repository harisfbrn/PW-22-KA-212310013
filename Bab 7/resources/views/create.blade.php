<div class="card border-0">
    <div class="card-header bg-white border-0 px-4 py-3">
        <h5>Form User</h5>
    </div>
    <div class="card-body pt-0">
        @if ($errors->any())
        <div class="alert alert-danger mb-5">
            <strong>Error!</strong><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if ($message = Session::get('success'))
        <div class="alert alert-success mb-5">
            <p>{{$message}}</p>
        </div>
        @endif

        <form action="{{ url('/users') }}" method="post" autocomplete="off" id="form-user">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="hidden" class="form-control id" name="id" />
                <input type="text" class="form-control email" name="email" />
                <div class="form-text text-danger"></div>
            </div>
            <div class="mb-3">
                <label class="form-label">Fullname</label>
                <input type="text" class="form-control name" name="fullname"/>
                <div class="form-text text-danger"></div>
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea class="form-control address" name="address"></textarea>
                <div class="form-text text-danger"></div>
            </div>
            <div class="mb-3">
                <label class="form-label">Birthdate</label>
                <input type="date" name="birthdate"/>
                <div class="form-text text-danger"></div>
            </div>
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">+</span>
                    <input type="text" class="form-control phone" name="phone" />
                </div>
                <div class="form-text text-danger"></div>
            </div>
            <div class="mb-3">
                <label class="form-label">Gender</label>
                <div class="d-flex justify-conten-start align-items-center">
                    <label class="me-2">
                        <input type="radio" class="gender_M" name="gender" value="1" /> M
                    </label>
                    <label class="me-2">
                        <input type="radio" class="gender_F" name="gender" value="0" /> F
                    </label>
                </div>
                <div class="form-text text-danger"></div>
            </div>
            <div class="text-end">
                <button
                    class="btn-danger"
                    type="reset">Clear</button>
                <button
                    class="btn-primary"
                    type="submit">Save changes</button>
            </div>
    </div>
    </form>
</div>
</div>