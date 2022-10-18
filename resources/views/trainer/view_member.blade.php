<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--iconify-->
    <script src="https://code.iconify.design/iconify-icon/1.0.0/iconify-icon.min.js"></script>

    <!--global css-->
    <!--global css-->
    <link href="{{ asset('css/trainer/globals.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/trainer/trainerTrainingCenter.css')}}" rel="stylesheet" />

    <title>Hello, world!</title>
  </head>
  <body class="customer-loggedin-bg">

    <!--create gp modal-->
    <div class="modal fade" id="CreateGroupModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header  customer-transaction-modal-header">
              <h5 class="modal-title text-center" id="exampleModalLabel">Create Group</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="clearCreateGroupInputs()"></button>
            </div>
            <div class="modal-body">
             <form class="create-group-form" action="">
                <div class="create-group-name create-group-input">
                    <p>Group Name</p>
                    <input type="text" required>
                </div>
                <div class="create-group-member-type create-group-input">
                    <p>Member Type</p>
                    <select>
                        <option value="">Choose Member Type</option>
                    </select>
                </div>
                <div class="create-group-gender create-group-input">
                    <p>Gender</p>
                    <select>
                        <option value="">Choose Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="create-group-group-type create-group-input">
                    <p>Group Type</p>
                    <select>
                        <option value="">Choose Group Type</option>
                        <option value="weightLoss">Weight Loss</option>
                        <option value="bodyBeauty">Body Beauty</option>
                    </select>
                </div>

                <div class="create-group-form-btns-contaier">
                    <button type="submit" class="customer-primary-btn">Confirm</button>
                    <button type="reset" class="customer-secondary-btn">Cancel</button>
                </div>
             </form>

            </div>

          </div>
        </div>
    </div>

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
                    <div class="add-member-row">
                        <div class="add-member-name-container">
                            <img src="../imgs/avatar.png">
                            <p>Customer Name</p>
                        </div>

                        <div class="add-member-row-btns-container">
                            <label class="add-member-checkbox">
                                <input type="checkbox" value="1">
                                <p>Add</p>
                            </label>

                            <a href="#" class="customer-secondary-btn add-member-view-profile-btn">View Profile</a>
                        </div>
                    </div>
                    <div class="add-member-row">
                        <div class="add-member-name-container">
                            <img src="../imgs/avatar.png">
                            <p>Customer Name</p>
                        </div>

                        <div class="add-member-row-btns-container">
                            <label class="add-member-checkbox">
                                <input type="checkbox"  value="2">
                                <p>Add</p>
                            </label>

                            <a href="#" class="customer-secondary-btn add-member-view-profile-btn">View Profile</a>
                        </div>
                    </div>
                    <div class="add-member-row">
                        <div class="add-member-name-container">
                            <img src="../imgs/avatar.png">
                            <p>Customer Name</p>
                        </div>

                        <div class="add-member-row-btns-container">
                            <label class="add-member-checkbox">
                                <input type="checkbox"  value="3">
                                <p>Add</p>
                            </label>

                            <a href="#" class="customer-secondary-btn add-member-view-profile-btn">View Profile</a>
                        </div>
                    </div>
                    <div class="add-member-row">
                        <div class="add-member-name-container">
                            <img src="../imgs/avatar.png">
                            <p>Customer Name</p>
                        </div>

                        <div class="add-member-row-btns-container">
                            <label class="add-member-checkbox">
                                <input type="checkbox"  value="4">
                                <p>Add</p>
                            </label>

                            <a href="#" class="customer-secondary-btn add-member-view-profile-btn">View Profile</a>
                        </div>
                    </div>
                    <div class="add-member-row">
                        <div class="add-member-name-container">
                            <img src="../imgs/avatar.png">
                            <p>Customer Name</p>
                        </div>

                        <div class="add-member-row-btns-container">
                            <label class="add-member-checkbox">
                                <input type="checkbox"  value="5">
                                <p>Add</p>
                            </label>

                            <a href="#" class="customer-secondary-btn add-member-view-profile-btn">View Profile</a>
                        </div>
                    </div>
                    <div class="add-member-row">
                        <div class="add-member-name-container">
                            <img src="../imgs/avatar.png">
                            <p>Customer Name</p>
                        </div>

                        <div class="add-member-row-btns-container">
                            <label class="add-member-checkbox">
                                <input type="checkbox"  value="6">
                                <p>Add</p>
                            </label>

                            <a href="#" class="customer-secondary-btn add-member-view-profile-btn">View Profile</a>
                        </div>
                    </div>
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
    <div class="customer-header customer-header-with-shadow">
        <div class="customer-main-content-container customer-navbar-container">
            <div class="customer-logo-language-container">
                <div class="customer-logo">
                    LOGO
                </div>
                <div class="customer-language-container">
                    <div class="customer-language-flag-container">
                        <img src="../imgs/ukflag.png">
                    </div>

                    <select>
                        <option value="">Myanmar</option>
                        <option value="">English</option>
                    </select>
                </div>

            </div>
            <div class="customer-navlinks-container">
                <a href="#">Home</a>
                <a href="#">Shop</a>
                <a href="#">Search</a>
                <a href="#">Training Center</a>
                <a href="#">Notifications</a>
                <a href="#">Account</a>
            </div>
        </div>
    </div>

    <div class="customer-main-content-container">
        <div class="trainer-main-content-container">
            <button data-bs-toggle="modal" data-bs-target="#CreateGroupModal" class="trainer-create-gp-modal-btn customer-primary-btn">
                <iconify-icon icon="akar-icons:circle-plus" class="trainer-create-gp--modal-btn-icon"></iconify-icon>
                <p>Group</p>
            </button>

            <div class="trainer-two-columns-container">
                <div class="trainer-group-chats-parent-container">
                    <p>Groups</p>
                    <div class="trainer-group-chats-container">
                        <!-- <a href="#" class="tainer-group-chat-name-container">
                            <img src="../imgs/avatar.png"/>
                            <p>Group Name</p>
                        </a> -->
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
                    <!-- <div class="group-chat-messages-container">
                        <div class="group-chat-receiver-container">
                            <img src="../imgs/avatar.png"/>
                            <div class="group-chat-receiver-text-container">
                                <span>Group Member</span>
                                <p>This is a long text message.This is a long text message.This is a long text message.This is a long text message.This is a long text message.</p>
                            </div>
                        </div>
                        <div class="group-chat-receiver-container">
                            <img src="../imgs/avatar.png"/>
                            <div class="group-chat-receiver-text-container">
                                <span>Group Member</span>
                                <p>This is a long text message</p>
                            </div>
                        </div>
                        <div class="group-chat-receiver-container">
                            <img src="../imgs/avatar.png"/>
                            <div class="group-chat-receiver-text-container">
                                <span>Group Member</span>
                                <p>This is a long text message</p>
                            </div>
                        </div>
                        <div class="group-chat-receiver-container">
                            <img src="../imgs/avatar.png"/>
                            <div class="group-chat-receiver-text-container">
                                <span>Group Member</span>
                                <p>This is a long text message</p>
                            </div>
                        </div>
                        <div class="group-chat-receiver-container">
                            <img src="../imgs/avatar.png"/>
                            <div class="group-chat-receiver-text-container">
                                <span>Group Member</span>
                                <p>This is a long text message</p>
                            </div>
                        </div>

                        <div class="group-chat-sender-container">
                            <div class="group-chat-sender-text-container">

                                <p>This is a long text message</p>
                            </div>
                            <img src="../imgs/avatar.png"/>
                        </div>
                        <div class="group-chat-sender-container">
                            <div class="group-chat-sender-text-container">

                                <p>This is a long text message This is a long text message This is a long text message This is a long text message</p>
                            </div>
                            <img src="../imgs/avatar.png"/>
                        </div>
                    </div> -->

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
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@joeattardi/emoji-button@3.0.3/dist/index.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/emoji-picker/1.1.5/js/emoji-picker.min.js" integrity="sha512-EDnYyP0SRH/j5K7bYQlIQCwjm8dQtwtsE+Xt0Oyo9g2qEPDlwE+1fbvKqXuCoMfRR/9zsjSBOFDO6Urjefo28w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <!-- <script src="../js/emoji.js"></script> -->
    <script>

        function clearCreateGroupInputs(){
            const inputs = document.querySelectorAll(".create-group-form input"+",.create-group-form select")
            // console.log(inputs)
            for(var i = 0;i < inputs.length;i++){
                // console.log("hi")
                // console.log(inputs[i])
                inputs[i].value = ""
            }
        }
        const addMemberCheckboxes = document.querySelectorAll(".add-member-checkbox input")


        for(var i = 0; i < addMemberCheckboxes.length;i++){

            addMemberCheckboxes[i].addEventListener("change", function(){

                if(this.checked){
                    this.parentElement.classList.add("add-member-checked")
                }else{
                    this.parentElement.classList.remove("add-member-checked")
                }
            })
        }

        const groupChatImgInput = document.querySelector('#groupChatImg');
        const groupChatImgPreview = document.querySelector('.groupChatImg');
        const cancelBtn = document.querySelector(".group-chat-img-cancel")
        const messageInput = document.querySelector(".group-chat-send-form-input")

        const button = document.querySelector('#emoji-button');

        const picker = new EmojiButton();

        button.addEventListener('click', () => {
        picker.togglePicker(button);

        });

        picker.on('emoji', emoji => {
            messageInput.value += emoji;
        });


        if(!groupChatImgPreview.hasAttribute("src")){
            groupChatImgPreview.remove()
            cancelBtn.remove()
        }


        groupChatImgInput.addEventListener('change', (e) =>{
            // console.log(kpayPreview)
        const reader = new FileReader();
        reader.onloadend = e => groupChatImgPreview.setAttribute('src', e.target.result);
        reader.readAsDataURL(groupChatImgInput.files[0]);
        // if(groupChatImgPreview.hasAttribute("src")){
            console.log(reader)
            messageInput.remove()
            document.querySelector(".group-chat-send-form-message-parent-container").append(groupChatImgPreview)
            document.querySelector(".group-chat-send-form-message-parent-container").append(cancelBtn)
        // }
        });//

        function clearGroupChatImg(){
            groupChatImgPreview.removeAttribute("src")
            groupChatImgPreview.remove()
            cancelBtn.remove()
            document.querySelector(".group-chat-send-form-message-parent-container").append(messageInput)
            groupChatImgInput.value = ""
        }

        function uncheckAddMemberBoxes(){
            for(var i = 0; i < addMemberCheckboxes.length;i++){
                addMemberCheckboxes[i].checked = false
                addMemberCheckboxes[i].parentElement.classList.remove("add-member-checked")
            }
        }

        document.querySelector(".add-member-form").addEventListener("submit" , function(e) {
            e.preventDefault()
            const checkedAddMemberCheckBoxes = document.querySelectorAll(".add-member-checkbox input:checked")

            for(var i = 0; i < checkedAddMemberCheckBoxes.length;i++){
                console.log(checkedAddMemberCheckBoxes[i].value)
            }
        })


    </script>

  </body>
</html>
