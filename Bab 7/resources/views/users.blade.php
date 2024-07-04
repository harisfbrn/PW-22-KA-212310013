@extends('templates.layouts')

@section('content')

<div class="row mt-5">
        <div class="col-lg-8 col-xxl-8">
            <div class="card border-0">
                <div class="card-header bg-white border-0 px-4 py-3">
                    <div class="card-title">
                        <h5 class="fw-bolder text-gray-900 m-0">List of users</h5>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle ">
                            <thead class="fs-6 fw-bold bg-light">
                                <tr class="fs-7">
                                    <th>No</th>
                                    <th>Email</th>
                                    <th>Fullname</th>
                                    <th width="20%">Address</th>
                                    <th>Birthdate</th>
                                    <th width="20%">Phone</th>
                                    <th>Gender</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="fw-6 text-secondary">
                                @if (count($users) > 0)
                                    @foreach ($users as $index => $user)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->fullname }}</td>
                                            <td>
                                                <div style="height: 30px; overflow: hidden;">
                                                    {{ $user->address }}
                                                </div>
                                            </td>
                                            <td> {{ $user->birthdate }}</td>
                                            <td> {{ $user->phone }}</td>
                                            <td>{{ ($user->gender) ? "M":"F" }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button
                                                        class="btn btn-sm btn-danger"
                                                        title="Remove" type="button"
                                                        onclick="RemoveItem({{ $user->id }})">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                    <button title="Edit"
                                                        class="btn btn-sm btn-primary"
                                                        type="button" onclick="EditItem({{ $user->id }})">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">No Record Found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-xxl-4">
            @include('create')
        </div>
    </div>


    <script>
        const RemoveItem = (id) => {
            if (confirm("Are you sure wants to remove this user ?")) {
                const xmlhttp = new XMLHttpRequest();
                xmlhttp.onload = function() {
                    var data = JSON.parse(this.response);
                    alert(data.message);
                    window.location.href = "{{ route('m_user') }}";
                }
                xmlhttp.open("GET", "{{ url('') }}/users/remove/" + id);
                xmlhttp.send();
            }
        }
        const EditItem = (id) => {
            var targetDiv = document.getElementById("form-user");
            let id_ = targetDiv.getElementsByClassName("id")[0];
            let email = targetDiv.getElementsByClassName("email")[0];
            let full = targetDiv.getElementsByClassName("fullname")[0];
            let add = targetDiv.getElementsByClassName("address")[0];
            let birthdate = targetDiv.getElementsByClassName("birthdate")[0];
            let phone = targetDiv.getElementsByClassName("phone")[0];
            let gender_M = targetDiv.getElementsByClassName("gender_M")[0];
            let gender_F = targetDiv.getElementsByClassName("gender_F")[0];
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onload = function() {
                var data = JSON.parse(this.response);
                id_.value = data.id;
                email.value = data.email;
                full.value = data.full;
                add.value = data.add;
                birthdate.value = data.birthdate;
                phone.value = data.phone;
                if(data.gender === 1){
                    gender_M.checked = true;
                }else{
                    gender_F.checked = true;
                }
            }
            xmlhttp.open("GET", "{{ url('') }}/users/edit/" + id);
            xmlhttp.send();
        }
    </script>

@endsection