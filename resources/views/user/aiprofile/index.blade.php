@extends('layouts.app')

@section('css')
	<!-- Sweet Alert CSS -->
	<link href="{{URL::asset('plugins/sweetalert/sweetalert2.min.css')}}" rel="stylesheet" />

    <script>
.chat-container-small {
  max-height: 490px;
  height: 0px;
  overflow-y: scroll;
  padding-left: 1rem;
  padding-right: 1rem;
}
        </script>




@endsection

@section('page-header')
	<!-- PAGE HEADER -->
	<div class="page-header mt-5-7">
		<div class="page-leftheader">
			<h4 class="page-title mb-0">Add your Ai Preferences</h4>
			<ol class="breadcrumb mb-2">
				<!-- Breadcrumb items go here if needed -->
			</ol>
		</div>
		<div class="page-rightheader">
			<!-- Page right header content goes here if needed -->
		</div>
	</div>
	<!-- END PAGE HEADER -->
@endsection

@section('content')

<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="card border-0">    
            <div class="card-body pt-2">
                <form id="openai-form" action="" method="GET" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-md-center">
                        <div class="">
                            <div class="chat-message-container" id="chat-system">
                                <div class="card-body pl-0 pr-0">
                                <div class="d-flex">
								<div class="page-title">AI PROFILE</div>
							</div>

                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div id="chat-container">
                                                <!-- Static chat messages go here -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="input-box mb-0">
                                                <div class="chat-controllers">
                                                    <textarea type="message" class="form-control" rows="2" id="message" name="message" placeholder="{{ __('Type your message here...') }}"></textarea>
                                                    <div><a class="btn chat-button-icon" href="javascript:void(0)" id="mic-button"><i class="fa-solid fa-microphone"></i></a></div>
                                                    <div><button class="btn chat-button" id="chat-button">{{ __('Send') }} <i class="fa-solid fa-paper-plane-top ml-1"></i></button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-4">
    <div class="card border-0">    
            <div class="card-body pt-2">
                <form id="openai-form" action="" method="GET" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-md-center">
                        <div class="">
                            <div class="chat-message-container" id="chat-system">
                                <div class="card-body pl-0 pr-0">
                                <div class="d-flex">
								<div class="page-title">AI FAMILY PREFERENCES</div>
							</div>

                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div id="chat-container">
                                                <!-- Static chat messages go here -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="input-box mb-0">
                                                <div class="chat-controllers">
                                                    <textarea type="message" class="form-control" rows="2" id="message2" name="message2" placeholder="{{ __('Type your message here...') }}"></textarea>
                                                    <div><a class="btn chat-button-icon" href="javascript:void(0)" id="mic-button2"><i class="fa-solid fa-microphone"></i></a></div>
                                                    <div><button class="btn chat-button" id="chat-button">{{ __('Send') }} <i class="fa-solid fa-paper-plane-top ml-1"></i></button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-4">
    <div class="card border-0">    
            <div class="card-body pt-2">
                <form id="openai-form" action="" method="GET" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-md-center">
                        <div class="">
                            <div class="chat-message-container" id="chat-system">
                                <div class="card-body pl-0 pr-0">
                                <div class="d-flex">
								<div class="page-title">AI TRAVEL PREFERENCES</div>
							</div>

                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div id="chat-container">
                                                <!-- Static chat messages go here -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="input-box mb-0">
                                                <div class="chat-controllers">
                                                    <textarea type="message" class="form-control" rows="2" id="message3" name="message3" placeholder="{{ __('Type your message here...') }}"></textarea>
                                                    <div><a class="btn chat-button-icon" href="javascript:void(0)" id="mic-button3"><i class="fa-solid fa-microphone"></i></a></div>
                                                    <div><button class="btn chat-button" id="chat-button">{{ __('Send') }} <i class="fa-solid fa-paper-plane-top ml-1"></i></button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
     </div>

</div>







@endsection

@section('js')
<script src="{{URL::asset('plugins/sweetalert/sweetalert2.all.min.js')}}"></script>
<script src="{{URL::asset('plugins/pdf/html2canvas.min.js')}}"></script>
<script src="{{URL::asset('plugins/pdf/jspdf.umd.min.js')}}"></script>
<script src="{{URL::asset('plugins/highlight/highlight.min.js')}}"></script>
<script src="{{URL::asset('plugins/highlight/showdown.min.js')}}"></script>
<script src="{{URL::asset('js/export-chat.js')}}"></script>
<script type="text/javascript">
	const main_form = get("#openai-form");
	const input_text = get("#message");
	const msgerChat = get("#chat-container");
	const dynamicList = get("#dynamic-inputs");
	const msgerSendBtn = get("#chat-button");
	const bot_avatar = "/avatar/img/avatar.png";
	const user_avatar = "/avatar/img/avatar.png";	
	const mic = document.querySelector('#mic-button');
    const mic2 = document.querySelector('#mic-button2');
	const mic3 = document.querySelector('#mic-button3');

	let eventSource = null;
	let isTranscribing = false;
	let chat_code = "AIPROFILE";	
	let active_id;
	let default_message;

	// Process deault conversation
	$(document).ready(function() {
		$(".chat-sidebar-message").first().focus().trigger('click');

		let check_messages = document.querySelectorAll('.chat-sidebar-message').length;
		if (check_messages == 0) {
			let id = makeid(10);

			$.ajax({
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				method: 'POST',
				url: '/user/chat/conversation',
				data: { 'conversation_id': id, 'chat_code': chat_code},
				success: function (data) {

					if (data == 'success') {
						$('#dynamic-inputs').html('');

						$('.chat-sidebar-messages').prepend(`<div class="chat-sidebar-message selected-message" id=${id}>
								<div class="chat-title" id="title-${id}">
									{{ __('New Chat') }}
								</div>
								<div class="chat-info">
									<div class="chat-count"><span>0</span> {{ __('messages') }}</div>
									<div class="chat-date">{{ __('Now') }}</div>
								</div>
								<div class="chat-actions d-flex">
									<a href="#" class="chat-edit id=${id} fs-12"><i class="fa-sharp fa-solid fa-pen-to-square" data-tippy-content="{{ __('Edit Name') }}"></i></a>
									<a href="#" class="chat-delete  id=${id} fs-12 ml-2"><i class="fa-sharp fa-solid fa-trash" data-tippy-content="{{ __('Delete Chat') }}"></i></a>
								</div>
							</div>`);
						active_id = id;	
					} else {
						toastr.warning('{{ __('There was an issue while deleting chat conversation') }}');
					}		
								
				},
				error: function(data) {
					toastr.warning('{{ __('There was an issue while deleting chat conversation') }}');
				}
			});
		}
	});
	

	// Create new chat conversation
	$("#new-chat-button").on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
		let id = makeid(10);
		var element = document.getElementById(active_id);
		if (element) {
			element.classList.remove("selected-message");
		}

		$.ajax({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			method: 'POST',
			url: '/user/chat/conversation',
			data: { 'conversation_id': id, 'chat_code': chat_code},
			success: function (data) {

				if (data == 'success') {
					$('#dynamic-inputs').html('');

					$('.chat-sidebar-messages').prepend(`<div class="chat-sidebar-message selected-message" id=${id}>
							<div class="chat-title" id="title-${id}">
								{{ __('New Chat') }}
							</div>
							<div class="chat-info">
								<div class="chat-count"><span>0</span> {{ __('messages') }}</div>
								<div class="chat-date">{{ __('Now') }}</div>
							</div>
							<div class="chat-actions d-flex">
								<a href="#" class="chat-edit id=${id} fs-12"><i class="fa-sharp fa-solid fa-pen-to-square" data-tippy-content="{{ __('Edit Name') }}"></i></a>
								<a href="#" class="chat-delete  id=${id} fs-12 ml-2"><i class="fa-sharp fa-solid fa-trash" data-tippy-content="{{ __('Delete Chat') }}"></i></a>
							</div>
						</div>`);
					active_id = id;	
				} else {
					toastr.warning('{{ __('There was an issue while creating chat conversation') }}');
				}		
							
			},
			error: function(data) {
				toastr.warning('{{ __('There was an issue while creating chat conversation') }}');
			}
		});
    });


	// Show chat history for conversation
	$(document).on('click', ".chat-sidebar-message", function (e) { 

		$('.chat-sidebar-message').removeClass('selected-message');
		$(this).addClass('selected-message');
		$('#dynamic-inputs').html('');
		$('#generating-status').addClass('show-chat-loader');
		active_id = this.id;
		let code = makeid(10);

		$('.chat-sidebar-container').removeClass('extend');

		$.ajax({
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				method: 'POST',
				url: '/user/chat/history',
				data: { 'conversation_id': active_id,},
				success: function (data) {

					$('#dynamic-inputs').html('');
					$('#generating-status').removeClass('show-chat-loader');

					for (const key in data) {

						if(data[key]['prompt']) {
							appendMessage(user_avatar, "right", data[key]['prompt']);
						}

						if (data[key]['response']) {
							appendMessageSpecial(bot_avatar, "left", data[key]['response'], code);
						}
					}		
					
					hljs.highlightAll();
				},
				error: function(data) {
					toastr.warning('{{ __('There was an issue while retrieving chat history') }}');
				}
			});
	});




	// Check textarea input
	$(function () {		
		main_form.addEventListener("submit", event => {
			event.preventDefault();
			const message = input_text.value;
			if (!message) {
				toastr.warning('{{ __('Type your message first before sending') }}');
				return;
			}

			appendMessage(user_avatar, "right", message);
			input_text.value = "";
			process(message)
		});

	});






	// Counter for words
	function animateValue(id, start, end, duration) {
		if (start === end) return;
		var range = end - start;
		var current = start;
		var increment = end > start? 1 : -1;
		var stepTime = Math.abs(Math.floor(duration / range));
		var obj = document.getElementById(id);
		var timer = setInterval(function() {
			current += increment;
			if (current > 0) {
				obj.innerHTML = current;
			} else {
				obj.innerHTML = 0;
			}
			
			if (current == end) {
				clearInterval(timer);
			}
		}, stepTime);
	}


	// Display chat messages (bot and user)
	function appendMessage(img, side, text, code) {
		let msgHTML;
		text = escape_html(text);

		if (side == 'left' && text == '') {
			msgHTML = `
			<div class="msg ${side}-msg">
			<div class="message-img" style="background-image: url(${img})"></div>
			<div class="message-bubble" id="chat-bubble-${code}" data-message="${text}">
				<div class="msg-text" id="${code}"><img src='{{ URL::asset("/img/svgs/chat.svg") }}'></div>
				<a href="#" class="copy"><svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" fill="currentColor" width="20"> <path d="M180 975q-24 0-42-18t-18-42V312h60v603h474v60H180Zm120-120q-24 0-42-18t-18-42V235q0-24 18-42t42-18h440q24 0 42 18t18 42v560q0 24-18 42t-42 18H300Zm0-60h440V235H300v560Zm0 0V235v560Z"></path> </svg></a>
			</div>
			</div>`;
		} else {
			if (side == 'left') {
				msgHTML = `
				<div class="msg ${side}-msg">
				<div class="message-img" style="background-image: url(${img})"></div>
				<div class="message-bubble" id="chat-bubble-${code}" data-message="${text}">
					<div class="msg-text" id="${code}">${text}</div>
					<a href="#" class="copy"><svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" fill="currentColor" width="20"> <path d="M180 975q-24 0-42-18t-18-42V312h60v603h474v60H180Zm120-120q-24 0-42-18t-18-42V235q0-24 18-42t42-18h440q24 0 42 18t18 42v560q0 24-18 42t-42 18H300Zm0-60h440V235H300v560Zm0 0V235v560Z"></path> </svg></a>
				</div>
				</div>`;
			} else {
				msgHTML = `
				<div class="msg ${side}-msg">
				<div class="message-img" style="background-image: url(${img})"></div>
				<div class="message-bubble" id="chat-bubble-${code}">
					<div class="msg-text" id="${code}">${text}</div>
				</div>
				</div>`;
			}
			
		}

		dynamicList.insertAdjacentHTML("beforeend", msgHTML);
		msgerChat.scrollTop += 500;
	}

	function appendMessageSpecial(img, side, text, code, code) {
		let msgHTML;
		let copy_text = text;
		text = escape_html(text);

		msgHTML = `
		<div class="msg ${side}-msg">
		<div class="message-img" style="background-image: url(${img})"></div>
		<div class="message-bubble" id="chat-bubble-${code}" data-message="${copy_text}">
			<div class="msg-text" id="${code}">${text}</div>
			<a href="#" class="copy"><svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" fill="currentColor" width="20"> <path d="M180 975q-24 0-42-18t-18-42V312h60v603h474v60H180Zm120-120q-24 0-42-18t-18-42V235q0-24 18-42t42-18h440q24 0 42 18t18 42v560q0 24-18 42t-42 18H300Zm0-60h440V235H300v560Zm0 0V235v560Z"></path> </svg></a>
		</div>
		</div>`;
			
		dynamicList.insertAdjacentHTML("beforeend", msgHTML);
		msgerChat.scrollTop += 500;
	}

	function get(selector, root = document) {
		return root.querySelector(selector);
	}

	// Generate a random value
	function makeid(length) {
		let result = '';
		const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		const charactersLength = characters.length;
		let counter = 0;
		while (counter < length) {
			result += characters.charAt(Math.floor(Math.random() * charactersLength));
			counter += 1;
		}
		return result;
	}

	function nl2br (str, is_xhtml) {
     	var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
     	return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
  	} 

	$("#expand").on('click', function (e) {
        $('.chat-sidebar-container').toggleClass('extend');
    });

	// Search chat history
	$('#chat-search').on('keyup', function () {
        var search = $(this).val().toLowerCase();
        $('.chat-sidebar-messages').find('.chat-sidebar-message').each(function () {
            if ($(this).filter(function() {
                return $(this).find('h6').text().toLowerCase().indexOf(search) > -1;
            }).length > 0 || search.length < 1) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });


	// Send via keyboard shortcuts
	$('#message').on('keypress', function (e) {
		if (e.keyCode == 13 && !e.shiftKey) {
			e.preventDefault();
			const message = input_text.value;
			if (!message) {
				toastr.warning('{{ __('Type your message first before sending') }}');
				return;
			}			

			appendMessage(user_avatar, "right", message);
			input_text.value = "";
			process(message)
		}
    });


	// Capture input text via microphone
    if(mic) {
        if ('SpeechRecognition' in window || 'webkitSpeechRecognition' in window) {
            const speechRecognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();

            speechRecognition.continuous = true;

            speechRecognition.addEventListener('start', () => {
                $("#mic-button").find('i').removeClass('fa-microphone').addClass('fa-stop-circle');
            });

            speechRecognition.addEventListener('result', (event) => {
                const transcript = event.results[0][0].transcript;
                $("#message").val($("#message").val() + transcript + ' ');

                mic.click();
            });

            speechRecognition.addEventListener('end', () => {
                $("#mic-button").find('i').addClass('fa-microphone').removeClass('fa-stop-circle');
                isTranscribing = false;
            });

            mic.addEventListener('click', () => {
                if (!isTranscribing) {
                    speechRecognition.start();
                    isTranscribing = true;
                } else {
                    speechRecognition.stop();
                    isTranscribing = false;
                }
            });
        } else {
            console.log('Web Speech Recognition API not supported by this browser');
            $("#mic-button").hide()
        }
    }


    // Capture input text via microphone
    if(mic2) {
        if ('SpeechRecognition' in window || 'webkitSpeechRecognition' in window) {
            const speechRecognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();

            speechRecognition.continuous = true;

            speechRecognition.addEventListener('start', () => {
                $("#mic-button2").find('i').removeClass('fa-microphone').addClass('fa-stop-circle');
            });

            speechRecognition.addEventListener('result', (event) => {
                const transcript = event.results[0][0].transcript;
                $("#message2").val($("#message2").val() + transcript + ' ');

                mic.click();
            });

            speechRecognition.addEventListener('end', () => {
                $("#mic-button2").find('i').addClass('fa-microphone').removeClass('fa-stop-circle');
                isTranscribing = false;
            });

            mic2.addEventListener('click', () => {
                if (!isTranscribing) {
                    speechRecognition.start();
                    isTranscribing = true;
                } else {
                    speechRecognition.stop();
                    isTranscribing = false;
                }
            });
        } else {
            console.log('Web Speech Recognition API not supported by this browser');
            $("#mic-button2").hide()
        }
    }


    // Capture input text via microphone
    if(mic3) {
        if ('SpeechRecognition' in window || 'webkitSpeechRecognition' in window) {
            const speechRecognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();

            speechRecognition.continuous = true;

            speechRecognition.addEventListener('start', () => {
                $("#mic-button3").find('i').removeClass('fa-microphone').addClass('fa-stop-circle');
            });

            speechRecognition.addEventListener('result', (event) => {
                const transcript = event.results[0][0].transcript;
                $("#message3").val($("#message3").val() + transcript + ' ');

                mic.click();
            });

            speechRecognition.addEventListener('end', () => {
                $("#mic-button3").find('i').addClass('fa-microphone').removeClass('fa-stop-circle');
                isTranscribing = false;
            });

            mic3.addEventListener('click', () => {
                if (!isTranscribing) {
                    speechRecognition.start();
                    isTranscribing = true;
                } else {
                    speechRecognition.stop();
                    isTranscribing = false;
                }
            });
        } else {
            console.log('Web Speech Recognition API not supported by this browser');
            $("#mic-button3").hide()
        }
    }


	// Stop chat response
	$('#stop-button').on('click', function(e){
        e.preventDefault();

        if(eventSource){
            eventSource.close();
			msgerSendBtn.disabled = false
        }
    });


	// Apply prompt
	function applyPrompt(prompt) {
		$('#message').text(prompt);
	}


	// Search prompt
	$(document).on('keyup', '#search-template', function () {
		var searchTerm = $(this).val().toLowerCase();
		$('#templates-panel').find('> div').each(function () {
			if ($(this).filter(function() {
				return (($(this).find('h6').text().toLowerCase().indexOf(searchTerm) > -1) || ($(this).find('p').text().toLowerCase().indexOf(searchTerm) > -1));
			}).length > 0 || searchTerm.length < 1) {
				$(this).show();
			} else {
				$(this).hide();
			}
		});
	});


	function escape_html (str) {
        let converter = new showdown.Converter({openLinksInNewWindow: true});
        converter.setFlavor('github');
        str = converter.makeHtml(str);

        /* add copy button */
        str = str.replaceAll('</code></pre>', '</code><button type="button" class="copy-code" onclick="copyCode(this)"><span class="label-copy-code">{{ __('Copy') }}</span></button></pre>');

        return str;
    }

	function copyCode(button) {
		const pre = button.parentElement;
		const code = pre.querySelector('code');
		const range = document.createRange();
		range.selectNode(code);
		window.getSelection().removeAllRanges();
		window.getSelection().addRange(range);
		document.execCommand("copy");
		window.getSelection().removeAllRanges();
		toastr.success('{{ __('Code has been copied successfully') }}');
	}

	$(document).on('click', ".copy", function (e) {

		var textArea = document.createElement("textarea");
		textArea.value = $(this).parents('.message-bubble').data('message');
		textArea.style.top = "0";
		textArea.style.left = "0";
		textArea.style.position = "fixed";
		document.body.appendChild(textArea);
		textArea.focus();
		textArea.select();

		try {
			document.execCommand('copy');
		} catch (err) {
		}

		document.body.removeChild(textArea);
		toastr.success('{{ __('Response has been copied successfully') }}');
	});

</script>
@endsection
