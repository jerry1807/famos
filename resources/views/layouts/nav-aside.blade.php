<!-- SIDE MENU BAR -->
<aside class="app-sidebar"> 
    <div class="app-sidebar__logo">
        <a class="header-brand" href="{{url('/')}}">
            <img src="{{URL::asset('img/brand/logo.png')}}" class="header-brand-img desktop-lgo" alt="Admintro logo">
            <img src="{{URL::asset('img/brand/favicon.png')}}" class="header-brand-img mobile-logo" alt="Admintro logo">
        </a>
    </div>
    <ul class="side-menu app-sidebar3">
        <li class="slide">
            <a class="side-menu__item" href="{{ route('aidash') }}">
            <span class="side-menu__icon lead-3 fa-solid fa-chart-tree-map"></span>
            <span class="side-menu__label">{{ __('HQ') }}</span></a>
        </li> 

        @role('user|subscriber')
            @if (config('settings.wizard_feature_user') == 'allow')
                <li class="slide">
                    <a class="side-menu__item" href="{{ route('user.wizard') }}">
                    <span class="side-menu__icon lead-3 fs-18 fa-solid fa-sharp fa-sparkles"></span>
                    <span class="side-menu__label">{{ __('AI Article Wizard') }}</span></a>
                </li> 
            @endif
        @endrole
        @role('admin')
            <li class="slide">
                <a class="side-menu__item" href="{{ route('user.wizard') }}">
                <span class="side-menu__icon lead-3 fs-18 fa-solid fa-sharp fa-sparkles"></span>
                <span class="side-menu__label">{{ __('AI Article Wizard') }}</span></a>
            </li> 
        @endrole

        
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="{{ url('#')}}">
                <span class="side-menu__icon fa-solid fa-folder-bookmark"></span>
                <span class="side-menu__label">{{ __('AI Chats') }}</span><i class="angle fa fa-angle-right"></i></a>

                
                <ul class="slide-menu">
                    <li><a href="{{ route('user.aibots') }}" class="slide-item">{{ __('My Chats') }}</a></li>
                    @role('user|subscriber')
                        @if (config('settings.image_feature_user') == 'allow')
                            <li><a href="{{ route('user.documents.images') }}" class="slide-item">{{ __('Group Chats') }}</a></li> 
                        @endif 
                    @endrole
                    @role('admin')
                        <li><a href="{{ route('user.documents.images') }}" class="slide-item">{{ __('Group Chats') }}</a></li>
                    @endrole
                </ul>
        </li>




       
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="{{ url('#')}}">
                <span class="side-menu__icon fa-solid fa-microchip-ai fs-18"></span>
                <span class="side-menu__label">AI Toolkits</span><i class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">         
                <li class="slide">
                <li><a href="{{ route('user.dashboard') }}" class="slide-item">{{ __('Dashboard') }}</a></li>
                <li><a href="{{ route('user.templates') }}" class="slide-item">{{ __('Templates') }}</a></li>
                <li><a href="{{ route('user.chat') }}" class="slide-item">{{ __('Chat') }}</a></li>
                <li><a href="{{ route('user.images') }}" class="slide-item">{{ __('Images') }}</a></li>
                <li><a href="{{ route('user.voiceover') }}" class="slide-item">{{ __('Voiceover') }}</a></li>
                <li><a href="{{ route('user.transcribe') }}" class="slide-item">{{ __('Speech to Text') }}</a></li>
                <li><a href="{{ route('user.codex') }}" class="slide-item">{{ __('Code') }}</a></li>
                </ul>
                <li class="slide">
                  <a class="side-menu__item" data-toggle="slide" href="{{ url('#')}}">
                <span class="side-menu__icon fa-solid fa-folder-bookmark"></span>
                <span class="side-menu__label">{{ __('Ai Docs') }}</span><i class="angle fa fa-angle-right"></i></a>

                
                <ul class="slide-menu">
                 
                <li><a href="{{ route('user.documents') }}" class="slide-item">{{ __('All Documents') }}</a></li>
                    @role('user|subscriber')
                        @if (config('settings.image_feature_user') == 'allow')
                            <li><a href="{{ route('user.documents.images') }}" class="slide-item">{{ __('All Images') }}</a></li> 
                        @endif 
                    @endrole
                    @role('admin')
                        <li><a href="{{ route('user.documents.images') }}" class="slide-item">{{ __('All Images') }}</a></li>
                    @endrole
                    @role('user|subscriber')
                        @if (config('settings.voiceover_feature_user') == 'allow')
                            <li><a href="{{ route('user.documents.voiceovers') }}" class="slide-item">{{ __('All Voiceover') }}</a></li> 
                        @endif 
                    @endrole
                    @role('admin')
                        <li><a href="{{ route('user.documents.voiceovers') }}" class="slide-item">{{ __('All Voiceover') }}</a></li> 
                    @endrole




                    @role('user|subscriber')
                        @if (config('settings.whisper_feature_user') == 'allow')
                            <li><a href="{{ route('user.documents.transcripts') }}" class="slide-item">{{ __('All Transcripts') }}</a></li> 
                        @endif 
                    @endrole
                    @role('admin')
                        <li><a href="{{ route('user.documents.transcripts') }}" class="slide-item">{{ __('All Transcripts') }}</a></li> 
                    @endrole
                    @role('user|subscriber')
                        @if (config('settings.code_feature_user') == 'allow')
                            <li><a href="{{ route('user.documents.codes') }}" class="slide-item">{{ __('All Codes') }}</a></li> 
                        @endif 
                    @endrole
                    @role('admin')
                        <li><a href="{{ route('user.documents.codes') }}" class="slide-item">{{ __('All Codes') }}</a></li> 
                    @endrole
                    
                    <li><a href="{{ route('user.workbooks') }}" class="slide-item">{{ __('Workbooks') }}</a></li>   
                </ul>
        </li>
        
        <li class="slide">
            <a class="side-menu__item" href="#">
            <span class="side-menu__icon lead-3 fa-solid fa-network-wired"></span>
            <span class="side-menu__label">{{ __('Connections ') }}</span></a>
        </li> 

    
        
        <li class="slide">
            <a class="side-menu__item" href="{{ route('user.communications.index') }}">
            <span class="side-menu__icon lead-3 fa-regular fa-comments"></span>
            <span class="side-menu__label">{{ __('Communications') }}</span></a>
        </li> 
        </li>









        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="{{ url('#')}}">
                <span class="side-menu__icon fa-solid fa-folder-bookmark"></span>
                <span class="side-menu__label">{{ __('Drive') }}</span><i class="angle fa fa-angle-right"></i></a>

                
                <ul class="slide-menu">
                    <li><a href="{{ route('user.aifiles') }}" class="slide-item">{{ __('Add files') }}</a></li>
                    @role('user|subscriber')
                        @if (config('settings.image_feature_user') == 'allow')
                            <li><a href="{{ route('user.allfiles') }}" class="slide-item">{{ __('Manage files') }}</a></li> 
                        @endif 
                    @endrole
                    @role('admin')
                        <li><a href="{{ route('user.allfiles') }}" class="slide-item">{{ __('Manage files') }}</a></li>
                    @endrole

                    @role('user|subscriber')
                        @if (config('settings.image_feature_user') == 'allow')
                            <li><a href="#" class="slide-item">{{ __('AI Profile') }}</a></li> 
                        @endif 
                    @endrole
                    @role('admin')
                        <li><a href="#" class="slide-item">{{ __('AI Profile') }}</a></li>
                    @endrole
                
                
                

                    
                </ul>
        </li>
        



  






        <hr class="w-90 text-center m-auto">
        <li class="side-item side-item-category mt-4 mb-3">{{ __('Account') }}</li>



        
      


        <li class="slide">
            <a class="side-menu__item" href="{{ route('user.profile') }}">
            <span class="side-menu__icon lead-3 fa-solid fa-id-badge"></span>
            <span class="side-menu__label">{{ __('My Account') }}</span></a>
        </li>

        <li class="slide">
            <a class="side-menu__item" href="{{ route('user.plans') }}">
            <span class="side-menu__icon lead-3 fa-solid fa-box-circle-check"></span>
            <span class="side-menu__label">{{ __('Subscription Plans') }}</span></a>
        </li>
        @if (config('settings.team_members_feature') == 'enable')
            <li class="slide">
                <a class="side-menu__item" href="{{ route('user.team') }}">
                <span class="side-menu__icon lead-3 fa-solid fa-people-arrows"></span>
                <span class="side-menu__label">{{ __('Team Members') }}</span></a>
            </li>
        @endif 
        
        @if (config('payment.referral.enabled') == 'on')
            <li class="slide mb-3">
                <a class="side-menu__item" href="{{ route('user.referral') }}">
                <span class="side-menu__icon lead-3 fa-solid fa-badge-dollar"></span>
                <span class="side-menu__label">{{ __('Affiliate Program') }}</span></a>
            </li>
        @endif 
        @role('admin')
            <hr class="w-90 text-center m-auto">
            <li class="side-item side-item-category mt-4 mb-3">{{ __('Admin Panel') }}</li>
            <li class="slide">
                <a class="side-menu__item"  href="{{ route('admin.dashboard') }}">
                    <span class="side-menu__icon fa-solid fa-chart-tree-map"></span>
                    <span class="side-menu__label">{{ __('Dashboard') }}</span>
                </a>
            </li>
            <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="{{ url('#')}}">
                        <span class="side-menu__icon fa-solid fa-microchip-ai fs-18"></span>
                        <span class="side-menu__label">{{ __('Davinci Management') }}</span><i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.davinci.dashboard') }}" class="slide-item">{{ __('Davinci Dashboard') }}</a></li>
                        <li><a href="{{ route('admin.davinci.templates') }}" class="slide-item">{{ __('Davinci Templates') }}</a></li>
                        <li><a href="{{ route('admin.davinci.custom') }}" class="slide-item">{{ __('Custom Templates') }}</a></li>
                        <li><a href="{{ route('admin.davinci.custom.category') }}" class="slide-item">{{ __('Template Categories') }}</a></li>
                        <li><a href="{{ route('admin.davinci.voices') }}" class="slide-item">{{ __('Voices Customization') }}</a></li>
                        <li><a href="{{ route('admin.davinci.chats') }}" class="slide-item">{{ __('AI Chats Customization') }}</a></li>
                        <li><a href="{{ route('admin.davinci.configs') }}" class="slide-item">{{ __('Davinci Settings') }}</a></li>
                    </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('#')}}">
                    <span class="side-menu__icon fa-solid fa-id-badge"></span>
                    <span class="side-menu__label">{{ __('User Management') }}</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.user.dashboard') }}" class="slide-item">{{ __('User Dashboard') }}</a></li>
                        <li><a href="{{ route('admin.user.list') }}" class="slide-item">{{ __('User List') }}</a></li>
                        <li><a href="{{ route('admin.user.activity') }}" class="slide-item">{{ __('Activity Monitoring') }}</a></li>
                    </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('#')}}">
                    <span class="side-menu__icon fa-solid fa-sack-dollar"></span>
                    <span class="side-menu__label">{{ __('Finance Management') }}</span>
                    @if (auth()->user()->unreadNotifications->where('type', 'App\Notifications\PayoutRequestNotification')->count())
                        <span class="badge badge-warning">{{ auth()->user()->unreadNotifications->where('type', 'App\Notifications\PayoutRequestNotification')->count() }}</span>
                    @else
                        <i class="angle fa fa-angle-right"></i>
                    @endif
                </a>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.finance.dashboard') }}" class="slide-item">{{ __('Finance Dashboard') }}</a></li>
                        <li><a href="{{ route('admin.finance.transactions') }}" class="slide-item">{{ __('Transactions') }}</a></li>
                        <li><a href="{{ route('admin.finance.plans') }}" class="slide-item">{{ __('Subscription Plans') }}</a></li>
                        <li><a href="{{ route('admin.finance.prepaid') }}" class="slide-item">{{ __('Prepaid Plans') }}</a></li>
                        <li><a href="{{ route('admin.finance.subscriptions') }}" class="slide-item">{{ __('Subscribers') }}</a></li>
                        <li><a href="{{ route('admin.finance.promocodes') }}" class="slide-item">{{ __('Promocodes') }}</a></li>
                        <li><a href="{{ route('admin.referral.settings') }}" class="slide-item">{{ __('Referral System') }}</a></li>
                        <li><a href="{{ route('admin.referral.payouts') }}" class="slide-item">{{ __('Referral Payouts') }}
                                @if ((auth()->user()->unreadNotifications->where('type', 'App\Notifications\PayoutRequestNotification')->count()))
                                    <span class="badge badge-warning ml-5">{{ auth()->user()->unreadNotifications->where('type', 'App\Notifications\PayoutRequestNotification')->count() }}</span>
                                @endif
                            </a>
                        </li>
                        <li><a href="{{ route('admin.settings.invoice') }}" class="slide-item">{{ __('Invoice Settings') }}</a></li>
                        <li><a href="{{ route('admin.finance.settings') }}" class="slide-item">{{ __('Payment Settings') }}</a></li>
                    </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item"  href="{{ route('admin.support') }}">
                    <span class="side-menu__icon fa-solid fa-message-question"></span>
                    <span class="side-menu__label">{{ __('Support Requests') }}</span>
                    @if (App\Models\SupportTicket::where('status', 'Open')->count())
                        <span class="badge badge-warning">{{ App\Models\SupportTicket::where('status', 'Open')->count() }}</span>
                    @endif 
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('#')}}">
                    <span class="side-menu__icon fa-solid fa-message-exclamation"></span>
                    <span class="side-menu__label">{{ __('Notifications') }}</span>
                        @if (auth()->user()->unreadNotifications->where('type', '<>', 'App\Notifications\GeneralNotification')->count())
                            <span class="badge badge-warning" id="total-notifications-a"></span>
                        @else
                            <i class="angle fa fa-angle-right"></i>
                        @endif
                    </a>                     
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.notifications') }}" class="slide-item">{{ __('Mass Notifications') }}</a></li>
                        <li><a href="{{ route('admin.notifications.system') }}" class="slide-item">{{ __('System Notifications') }} 
                                @if ((auth()->user()->unreadNotifications->where('type', '<>', 'App\Notifications\GeneralNotification')->count()))
                                    <span class="badge badge-warning ml-5" id="total-notifications-b"></span>
                                @endif
                            </a>
                        </li>
                    </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('#')}}">
                    <span class="side-menu__icon fa-solid fa-earth-americas"></span>
                    <span class="side-menu__label">{{ __('Frontend Management') }}</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.settings.frontend') }}" class="slide-item">{{ __('Frontend Settings') }}</a></li>
                        <li><a href="{{ route('admin.settings.appearance') }}" class="slide-item">{{ __('SEO & Logos') }}</a></li>                        
                        <li><a href="{{ route('admin.settings.blog') }}" class="slide-item">{{ __('Blogs Manager') }}</a></li>
                        <li><a href="{{ route('admin.settings.faq') }}" class="slide-item">{{ __('FAQs Manager') }}</a></li>
                        <li><a href="{{ route('admin.settings.review') }}" class="slide-item">{{ __('Reviews Manager') }}</a></li>
                        <li><a href="{{ route('admin.settings.terms') }}" class="slide-item">{{ __('T&C Pages Manager') }}</a></li>                           
                        <li><a href="{{ route('admin.settings.adsense') }}" class="slide-item">{{ __('Google Adsense') }}</a></li>                           
                    </ul>
            </li>
            <li class="slide mb-3">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('#')}}">
                    <span class="side-menu__icon fa fa-sliders"></span>
                    <span class="side-menu__label">{{ __('General Settings') }}</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="{{ route('admin.settings.global') }}" class="slide-item">{{ __('Global Settings') }}</a></li>
                        <li><a href="{{ route('admin.settings.oauth') }}" class="slide-item">{{ __('Auth Settings') }}</a></li>
                        <li><a href="{{ route('admin.settings.registration') }}" class="slide-item">{{ __('Registration Settings') }}</a></li>
                        <li><a href="{{ route('admin.settings.smtp') }}" class="slide-item">{{ __('SMTP Settings') }}</a></li>
                        <li><a href="{{ route('admin.settings.backup') }}" class="slide-item">{{ __('Database Backup') }}</a></li>
                        <li><a href="{{ route('admin.settings.activation') }}" class="slide-item">{{ __('Activation') }}</a></li>     
                        <li><a href="{{ route('admin.settings.upgrade') }}" class="slide-item">{{ __('Upgrade Software') }}</a></li>                 
                        <li><a href="{{ route('admin.settings.clear') }}" class="slide-item">{{ __('Clear Cache') }}</a></li>                 
                    </ul>
            </li>
        @endrole
        
    </ul>
</aside>
<!-- END SIDE MENU BAR -->
