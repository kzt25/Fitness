@extends('trainer.layouts.app')

@section('content')
@if (Session::has('success'))
        <script>
            Swal.fire(
            'Good job!',
            'You clicked the button!',
            'success'
            )
        </script>
    @endif
<div class="trainer-two-columns-container">
    <div class="trainer-group-chats-parent-container">
        <p>Groups</p>
        <div class="trainer-group-chats-container">
            <!-- <a href="#" class="tainer-group-chat-name-container">
                <img src="../imgs/avatar.png"/>
                <p>Group Name</p>
            </a> -->

            @foreach ($groups as $group)
                <a class="tainer-group-chat-name-container" id="group-chat" value="{{$group->id}}">
                    <img src="{{ asset('image/default.jpg')}}"/>
                    <p>{{$group->group_name}}</p>
                </a>
            @endforeach
        </div>
    </div>
    <div class="group-chat-container">
        <div class="group-chat-header">
            <a href="{{url('trainer/view_member')}}" class="group-chat-header-name-container">
                <img src="{{ asset('image/default.jpg')}} "/>
                <div class="group-chat-header-name-text-container">
                    <p id="group_name"></p>
                    <span id="group_member">group member, group member,group member,group member,group member,</span>
                </div>
            </a>

            <a href="../htmls/trainerTrainingCenterViewMedia.html" class="group-chat-view-midea-link">
                <p>View Media</p>
                <iconify-icon icon="akar-icons:arrow-right" class="group-chat-view-midea-link-icon"></iconify-icon>
            </a>
        </div>

        <div class="group-chat-messages-container">
            <div class="group-chat-receiver-container">
                <img src="../imgs/avatar.png"/>
            <div class="group-chat-receiver-container">
                <img src="{{ asset('image/default.jpg')}}"/>
                <div class="group-chat-receiver-text-container">
                    <span>Group Member</span>
                    <p>This is a long text message.This is a long text message.This is a long text message.This is a long text message.This is a long text message.</p>
                </div>
            </div>
            <div class="group-chat-receiver-container">
                <img src="{{ asset('image/default.jpg')}}"/>
                <div class="group-chat-receiver-text-container">
                    <span>Group Member</span>
                    <p>This is a long text message</p>
                </div>
            </div>
            <div class="group-chat-receiver-container">
                <img src="{{ asset('image/default.jpg')}}"/>
                <div class="group-chat-receiver-text-container">
                    <span>Group Member</span>
                    <p>This is a long text message</p>
                </div>
            </div>
            <div class="group-chat-receiver-container">
                <img src="{{ asset('image/default.jpg')}}"/>
                <div class="group-chat-receiver-text-container">
                    <span>Group Member</span>
                    <p>This is a long text message</p>
                </div>
            </div>
            <div class="group-chat-receiver-container">
                <img src="{{ asset('image/default.jpg')}}"/>
                <div class="group-chat-receiver-text-container">
                    <span>Group Member</span>
                    <p>This is a long text message</p>
                </div>
            </div>

            <div class="group-chat-sender-container">
                <div class="group-chat-sender-text-container">

                    <p>This is a long text message</p>
                </div>
                <img src="{{ asset('image/default.jpg')}}"/>
            </div>
            <div class="group-chat-sender-container">
                <div class="group-chat-sender-text-container">

                    <p>This is a long text message This is a long text message This is a long text message This is a long text message</p>
                </div>
                <img src="{{ asset('image/default.jpg')}}"/>
            </div>
            <div class="group-chat-sender-container">
                <div class="group-chat-sender-text-container">

                    <img src="{{ asset('image/default.jpg')}}">
                </div>
                <img src="{{ asset('image/default.jpg')}}"/>
            </div>
            <div class="group-chat-sender-container">
                <div class="group-chat-sender-text-container">

                    <video width="200" height="auto" controls>
                        <source src="../imgs/movie.mp4" type="video/mp4">
                    </video>
                </div>
                <img src="../imgs/avatar.png"/>
            </div>
            <img src="{{ asset('image/default.jpg')}}"/>
            </div>
        </div>

        <form class="group-chat-send-form-container">
            <div class="group-chat-send-form-message-parent-container">
                <div class="group-chat-send-form-img-emoji-container">
                    <label class="group-chat-send-form-img-contaier">
                        <iconify-icon icon="bi:images" class="group-chat-send-form-img-icon">

                        </iconify-icon>
                        <input type="file" id="groupChatImg" name="groupChatImg">
                    </label>
                    <button type="button" id="emoji-button" class="emoji-trigger">
                        <iconify-icon icon="bi:emoji-smile" class="group-chat-send-form-emoji-icon"></iconify-icon>
                    </button>

                </div>

                <textarea id="mytextarea"  class="group-chat-send-form-input" placeholder="Message..." required ></textarea>
                <img class="group-chat-img-preview groupChatImg">
                <div style="display: none;" class='video-prev'>
                    <video height="200" width="300" class="video-preview" controls="controls"></video>
                </div>
                <button type="reset"  class="group-chat-img-cancel" onclick="clearGroupChatImg()">
                    <iconify-icon icon="charm:cross" class="group-chat-img-cancel-icon"></iconify-icon>
                </button>
            </div>

            <button type="submit" class="group-chat-send-form-submit-btn">
                <iconify-icon icon="akar-icons:send" class="group-chat-send-form-submit-btn-icon"></iconify-icon>
            </button>
        </form>

    </div>
</div>

@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        $(document).on('click','#group-chat', function (e) {
            e.preventDefault();
            var group_id=$(this).val();
            $.ajax({
                type:"GET",
                url:"/trainer/group/show"+group_id,
                datatype:"json",
                success:function(data){
                    $("#group_name").append(data.data.group_name);
                    console.log(data.data.id);
                }
            })
        });
    })
</script>

    {{-- <script>
        $(document).ready(function() {
        @if (Session::has('success'))
                Toast.fire({
                    icon: 'success',
                    title: '{{ Session::get('success') }}'
                })
            @endif
        })
    </script> --}}
@endpush
