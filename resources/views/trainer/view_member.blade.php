@extends('trainer.layouts.app')

@section('content')

        <div class="trainer-two-columns-container">
            <div class="trainer-group-chats-parent-container">
                <p>Groups</p>
                <div class="trainer-group-chats-container">
                    @forelse ($groups as $group)
                        <a href ="{{route('trainer')}}" class="tainer-group-chat-name-container" id="group-chat" value="{{ $group->id }}"
                            data-id="{{ $group->id }}"
                            style=" background-color: transparent;background-repeat: no-repeat;border: none;cursor: pointer;overflow: hidden;outline: none;">
                            <img src="{{ asset('image/default.jpg') }}" />
                            <p>{{ $group->group_name }}</p>
                        </a>
                    @empty
                        <p class="text-secondary p-1">No Group</p>
                    @endforelse
                </div>
            </div>
            <div class="group-chat-container">
                <div class="group-chat-header">
                    <a href="" id="group" class="group-chat-header-name-container">
                        <img src="../imgs/avatar.png"/>
                        <div class="group-chat-header-name-text-container">
                            <p>{{$selected_group->group_name}}</p>
                        </div>
                    </a>

                    <a href="../htmls/trainerTrainingCenterViewMedia.html" class="group-chat-view-midea-link">
                        <p>View Media</p>
                        <iconify-icon icon="akar-icons:arrow-right" class="group-chat-view-midea-link-icon"></iconify-icon>
                    </a>
                </div>
                <div class="trainer-group-chat-view-members-header">
                    <a class="back-btn">
                        <iconify-icon icon="bi:arrow-left" class="back-btn-icon"></iconify-icon>
                    </a>

                    <div class="trainer-view-members-add-delete-btn-contaier">
                        <button data-bs-toggle="modal" data-bs-target="#addMemberModal"  class="trainer-view-members-add-btn">
                            <iconify-icon icon="akar-icons:circle-plus" class="trainer-view-members-add-icon"></iconify-icon>
                            <p>Add Member</p>
                        </button>
                        <form action="{{route('group.delete')}}">
                            <input type ="text" name = "group_id" value="{{$group->id}}" hidden>
                            <button  class="trainer-view-members-delete-btn customer-red-btn">
                                Delete Group
                            </button>
                        </form>

                    </div>
                </div>

                <div class="trainer-group-chat-members-container">
                    @forelse ($group_members as $m)
                        <div class="trainer-group-chat-member-row">
                            <div class="trainer-group-chat-member-name">
                                <img src="../imgs/avatar.png">
                                <p>{{$m->name}}</p>
                            </div>

                            <div class="trainer-group-chat-member-btns-container">
                                <a href="#" class="customer-secondary-btn">View Profile</a>
                                <a href="{{route('member.kick',$m->id)}}" class="trainer-group-chat-member-kick-btn customer-red-btn">Kick Member</a>
                            </div>

                        </div>
                    @empty
                    <p class="text-secondary p-1">No Group Members</p>
                    @endforelse
                </div>

            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        @if(!empty(Session::get('popup')))
        <script>
        $(document).ready(function () {
            console.log("popup");
          $(function() {
            $('#addMemberModal').modal('show');
          });
        });
       </script>
        @endif
        <script>
            $('#search').on('keyup', function(){
                    search();
                });
                search();
                function search(){
                    var keyword = $('#search').val();
                    var group_id = {{$selected_group->id}};

                    var search_url = "{{ route('trainer/member/search',':id') }}";
                    search_url = search_url.replace(':id', group_id);
                    $.post(search_url,
                    {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        keyword:keyword
                    },
                    function(data){
                        table_post_row(data);
                        console.log(data);
                    });
                }
                // table row with ajax
                function table_post_row(res){
                let htmlView = '';
                if(res.members.length <= 0){
                    htmlView+= `
                       No data found.
                    `;
                }
                for(let i = 0; i < res.members.length; i++){
                    id = res.members[i].id;
                    group_id = {{$selected_group->id}};
                    console.log("select",group_id);
                    var url = "{{ route('addMember',[':id',':group_id']) }}";
                    url = url.replace(':id', id);
                    url = url.replace(':group_id', group_id);
                    // console.log(url);
                    htmlView += `
                        <div class="add-member-row">
                            <div class="add-member-name-container">
                                <img src="../imgs/avatar.png">
                                <p>`+res.members[i].name+`</p>
                            </div>
                            <div class="add-member-row-btns-container">
                                <label class="add-member-checkbox">

                                    <a href = ${url} ><p>Add</p></a>
                                </label>
                                <a href="#" class="customer-secondary-btn add-member-view-profile-btn">View Profile</a>

                            </div>
                        </div>
                `}
                    $('.add-member-rows-container').html(htmlView);
                }
                $(document).on('click', '#group-chat', function() {
                    console.log("aa");
                    localStorage.setItem('selectGroup',$(this).data('id'));
                });
        </script>
@endsection



