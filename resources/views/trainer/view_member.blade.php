@extends('trainer.layouts.app')

@section('content')
<!--add member modal-->
<div class="modal fade" id="addMemberModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header  customer-transaction-modal-header">
          <h5 class="modal-title text-center" id="exampleModalLabel">Add Member</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="uncheckAddMemberBoxes()"></button>
        </div>
        <div class="modal-body">
         <form class="add-member-form" action="">
            <div class="add-member-rows-container">
                @foreach($member as $memb)
                <div class="add-member-row">
                    <div class="add-member-name-container">
                        <img src="../imgs/avatar.png">
                        <p>{{$memb->name}}</p>
                    </div>
                    <div class="add-member-row-btns-container">
                        <label class="add-member-checkbox">
                            <a href = "{{route('addMember',$memb->id)}}"><p>Add</p></a>
                        </label>
                        <a href="#" class="customer-secondary-btn add-member-view-profile-btn">View Profile</a>
                    </div>
                </div>
                @endforeach

            </div>

            <div class="create-group-form-btns-contaier">
                <button type="submit" class="customer-primary-btn">Confirm</button>
                <button type="reset" class="customer-secondary-btn" onclick="uncheckAddMemberBoxes()">Cancel</button>
            </div>
         </form>

        </div>

      </div>
    </div>
</div>




        <div class="trainer-two-columns-container">
            <div class="trainer-group-chats-parent-container">
                <p>Groups</p>
                <div class="trainer-group-chats-container">

                    <div class="tainer-group-chat-name-container">
                        <img src="../imgs/avatar.png"/>
                        <p>Group Name</p>
                    </div>
                    <div class="tainer-group-chat-name-container">
                        <img src="../imgs/avatar.png"/>
                        <p>Group Name</p>
                    </div>
                    <div class="tainer-group-chat-name-container">
                        <img src="../imgs/avatar.png"/>
                        <p>Group Name</p>
                    </div>
                </div>
            </div>
            <div class="group-chat-container">
                <div class="group-chat-header">
                    <a href="../htmls/trainerGroupChatViewMembers.html" class="group-chat-header-name-container">
                        <img src="../imgs/avatar.png"/>
                        <div class="group-chat-header-name-text-container">
                            <p>Group Name</p>
                            <span>group member, group member,group member,group member,group member,</span>
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

                        <a href="#" class="trainer-view-members-delete-btn customer-red-btn">
                            Delete Group
                        </a>
                    </div>
                </div>

                <div class="trainer-group-chat-members-container">
                    <div class="trainer-group-chat-member-row">
                        <div class="trainer-group-chat-member-name">
                            <img src="../imgs/avatar.png">
                            <p>Group Member</p>
                        </div>

                        <div class="trainer-group-chat-member-btns-container">
                            <a href="#" class="customer-secondary-btn">View Profile</a>
                            <a href="#" class="trainer-group-chat-member-kick-btn customer-red-btn">Kick Member</a>
                        </div>

                    </div>
                    <div class="trainer-group-chat-member-row">
                        <div class="trainer-group-chat-member-name">
                            <img src="../imgs/avatar.png">
                            <p>Group Member</p>
                        </div>

                        <div class="trainer-group-chat-member-btns-container">
                            <a href="#" class="customer-secondary-btn">View Profile</a>
                            <a href="#" class="trainer-group-chat-member-kick-btn customer-red-btn">Kick Member</a>
                        </div>

                    </div>
                    <div class="trainer-group-chat-member-row">
                        <div class="trainer-group-chat-member-name">
                            <img src="../imgs/avatar.png">
                            <p>Group Member</p>
                        </div>

                        <div class="trainer-group-chat-member-btns-container">
                            <a href="#" class="customer-secondary-btn">View Profile</a>
                            <a href="#" class="trainer-group-chat-member-kick-btn customer-red-btn">Kick Member</a>
                        </div>

                    </div>
                    <div class="trainer-group-chat-member-row">
                        <div class="trainer-group-chat-member-name">
                            <img src="../imgs/avatar.png">
                            <p>Group Member</p>
                        </div>

                        <div class="trainer-group-chat-member-btns-container">
                            <a href="#" class="customer-secondary-btn">View Profile</a>
                            <a href="#" class="trainer-group-chat-member-kick-btn customer-red-btn">Kick Member</a>
                        </div>

                    </div>
                    <div class="trainer-group-chat-member-row">
                        <div class="trainer-group-chat-member-name">
                            <img src="../imgs/avatar.png">
                            <p>Group Member</p>
                        </div>

                        <div class="trainer-group-chat-member-btns-container">
                            <a href="#" class="customer-secondary-btn">View Profile</a>
                            <a href="#" class="trainer-group-chat-member-kick-btn customer-red-btn ">Kick Member</a>
                        </div>

                    </div>
                    <div class="trainer-group-chat-member-row">
                        <div class="trainer-group-chat-member-name">
                            <img src="../imgs/avatar.png">
                            <p>Group Member</p>
                        </div>

                        <div class="trainer-group-chat-member-btns-container">
                            <a href="#" class="customer-secondary-btn">View Profile</a>
                            <a href="#" class="trainer-group-chat-member-kick-btn customer-red-btn ">Kick Member</a>
                        </div>

                    </div>
                    <div class="trainer-group-chat-member-row">
                        <div class="trainer-group-chat-member-name">
                            <img src="../imgs/avatar.png">
                            <p>Group Member</p>
                        </div>

                        <div class="trainer-group-chat-member-btns-container">
                            <a href="#" class="customer-secondary-btn">View Profile</a>
                            <a href="#" class="trainer-group-chat-member-kick-btn customer-red-btn ">Kick Member</a>
                        </div>

                    </div>
                    <div class="trainer-group-chat-member-row">
                        <div class="trainer-group-chat-member-name">
                            <img src="../imgs/avatar.png">
                            <p>Group Member</p>
                        </div>

                        <div class="trainer-group-chat-member-btns-container">
                            <a href="#" class="customer-secondary-btn">View Profile</a>
                            <a href="#" class="trainer-group-chat-member-kick-btn customer-red-btn ">Kick Member</a>
                        </div>

                    </div>
                    <div class="trainer-group-chat-member-row">
                        <div class="trainer-group-chat-member-name">
                            <img src="../imgs/avatar.png">
                            <p>Group Member</p>
                        </div>

                        <div class="trainer-group-chat-member-btns-container">
                            <a href="#" class="customer-secondary-btn">View Profile</a>
                            <a href="#" class="trainer-group-chat-member-kick-btn customer-red-btn ">Kick Member</a>
                        </div>

                    </div>
                    <div class="trainer-group-chat-member-row">
                        <div class="trainer-group-chat-member-name">
                            <img src="../imgs/avatar.png">
                            <p>Group Member</p>
                        </div>

                        <div class="trainer-group-chat-member-btns-container">
                            <a href="#" class="customer-secondary-btn">View Profile</a>
                            <a href="#" class="trainer-group-chat-member-kick-btn customer-red-btn ">Kick Member</a>
                        </div>

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
@endsection



