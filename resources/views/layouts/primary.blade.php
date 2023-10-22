<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if(!empty($super_settings['favicon']))

        <link rel="icon" type="image/png" href="{{PUBLIC_DIR}}/uploads/{{$super_settings['favicon']}}">
    @endif


    <title>سلسلة &#8211; منصة سلسلة لريادة الأعمال</title>


    <link id="pagestyle" href="{{PUBLIC_DIR}}/css/app.css?v=1128" rel="stylesheet"/> 


{{--    <link rel="stylesheet" href="frappe-gantt.css">--}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/frappe-gantt@0.5.0/dist/frappe-gantt.css" />
    
    {{-- START css file for change (direction|colors|font) --}}
    <link id="pagestyle" href="{{PUBLIC_DIR}}/css/custom.css" rel="stylesheet"/>
    {{-- END css file for change (direction|colors|font) --}}

    {{-- START css file for change color --}}
    <link id="pagestyle" href="{{PUBLIC_DIR}}/css/colors.css" rel="stylesheet"/>
    {{-- END css file for change color --}}

    @yield('head')

    <style>
        .nav-link{
            margin: 0px !important;
        }
    </style>

</head>

<body class="g-sidenav-show  bg-gray-100" id="clx_body">
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0  fixed-left " id="sidenav-main">
    <div class="sidenav-header h-auto">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute right-0 top-0 d-none d-xl-none"
           aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand text-center m-0 id='dash'" href="{{config('app.url')}}/dashboard">
            @if(!empty($super_settings['logo']))
                <img src="{{PUBLIC_DIR}}/uploads/{{$super_settings['logo']}}" class="navbar-brand-img h-100" alt="...">
            @else
                <span class="ms-1 font-weight-bold"> {{config('app.name')}}</span>
            @endif
        </a>
    </div>
    <div class=" text-center">
        @if(!empty($user->photo))
            <a href="javascript:" class="avatar avatar-md rounded-circle border border-secondary">
                <img alt="" class="p-1" src="{{PUBLIC_DIR}}/uploads/{{$user->photo}}">
            </a>
        @else
            <div class="avatar avatar-md  rounded-circle bg-purple-light  border-radius-md p-2">
{{--                <h6 class="text-purple text-uppercase mt-1">{{$user->first_name[0]}}{{$user->last_name[0]}}</h6>--}}
            </div>


        @endif
        <a href="/profile" class=" nav-link text-white font-weight-bold px-0">
            <span
                class="d-sm-inline d-none ">@if (!empty($user)) {{$user->first_name}} {{$user->last_name}}@endif</span>
        </a>

    </div>
    <hr class="horizontal dark mt-0">

    <div class="collapse navbar-collapse  w-auto  d-print-none " id="sidenav-collapse-main">

        <ul class="navbar-nav px-0">
            <li class="nav-item">
                <a class="nav-link @if(($selected_navigation ?? '') === 'dashboard') active @endif" id="abanoub" href="/dashboard">

                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    <span class="nav-link-text ms-3">{{ __('Dashboard') }}</span>
                </a>


            </li>



            <!---Start Osama Work---->

            <li class="nav-item mt-3 mb-2">
                <h6 class="ps-4 ms-2 text-uppercase text-muted text-xs opacity-6">{{__('marketing_and_economic_plan')}} </h6>
            </li>

            @if(empty($modules) || in_array('projects',$modules))
                <li class="nav-item ">
                    <a class="nav-link @if(($selected_navigation ?? '') === 'projects') active @endif "
                       href="/projects">

                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-grid">
                            <rect x="3" y="3" width="7" height="7"></rect>
                            <rect x="14" y="3" width="7" height="7"></rect>
                            <rect x="14" y="14" width="7" height="7"></rect>
                            <rect x="3" y="14" width="7" height="7"></rect>
                        </svg>
                        <span class="nav-link-text ms-3">{{__('Product Planning')}}</span>
                    </a>
                </li>

            @endif

            @if(empty($modules) || in_array('swot',$modules))
                <li class="nav-item">
                    <a class="nav-link  @if(($selected_navigation ?? '') === 'swot') active @endif" href="/swot-list">

                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-disc">
                            <circle cx="12" cy="12" r="10"></circle>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                        <span class="nav-link-text ms-3">{{__('SWOT Analysis')}}</span>
                    </a>
                </li>

            @endif

            @if(empty($modules) || in_array('porter',$modules))
                <li class="nav-item">
                    <a class="nav-link  @if(($selected_navigation ?? '') === 'porter') active @endif" href="/porter-models">

                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-life-buoy"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="4"></circle><line x1="4.93" y1="4.93" x2="9.17" y2="9.17"></line><line x1="14.83" y1="14.83" x2="19.07" y2="19.07"></line><line x1="14.83" y1="9.17" x2="19.07" y2="4.93"></line><line x1="14.83" y1="9.17" x2="18.36" y2="5.64"></line><line x1="4.93" y1="19.07" x2="9.17" y2="14.83"></line></svg>
                        <span class="nav-link-text ms-3">{{__('Porter 5-F Model')}}</span>
                    </a>
                </li>

            @endif

            @if(empty($modules) || in_array('pestle',$modules))
                <li class="nav-item">
                    <a class="nav-link  @if(($selected_navigation ?? '') === 'pestel') active @endif" href="/pestle-list">


                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                        <span class="nav-link-text ms-3">{{__('PESTLE Analysis')}}</span>
                    </a>
                </li>

            @endif
            @if(empty($modules) || in_array('project_revenue_planning',$modules))
                <li class="nav-item">
                    <a class="nav-link  @if(($selected_navigation ?? '') === 'project_revenue_planning') active @endif" href="/project-revenue-planning">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="20" height="20" fill="none" x="0" y="0" viewBox="0 0 512 512"  xml:space="preserve" class=""><g><path d="M126.559 231.405a7.998 7.998 0 0 0-5.126 7.466v34.258a8 8 0 0 0 5.126 7.466l17.125 6.592a115.757 115.757 0 0 0 10.849 26.171l-7.453 16.78a8 8 0 0 0 1.654 8.904l24.225 24.225a8 8 0 0 0 8.904 1.654l16.787-7.456a115.804 115.804 0 0 0 26.163 10.847l6.594 17.13a8 8 0 0 0 7.466 5.126h34.257a8 8 0 0 0 7.466-5.126l6.592-17.124a115.78 115.78 0 0 0 26.171-10.85l16.78 7.453a8.002 8.002 0 0 0 8.904-1.654l24.224-24.225a8.001 8.001 0 0 0 1.655-8.904l-7.456-16.788a115.774 115.774 0 0 0 10.847-26.161l17.129-6.594a7.998 7.998 0 0 0 5.126-7.466V238.87a8 8 0 0 0-5.126-7.466l-17.125-6.591a115.749 115.749 0 0 0-10.849-26.172l7.453-16.78a8 8 0 0 0-1.654-8.904l-24.225-24.224a8.004 8.004 0 0 0-8.904-1.654l-16.787 7.456a115.724 115.724 0 0 0-26.163-10.847l-6.594-17.131a8 8 0 0 0-7.466-5.126h-34.257a8.001 8.001 0 0 0-7.466 5.126l-6.594 17.131a115.697 115.697 0 0 0-26.163 10.847l-16.787-7.456a7.996 7.996 0 0 0-8.904 1.654l-24.224 24.225a8 8 0 0 0-1.654 8.904l7.455 16.784a115.784 115.784 0 0 0-10.848 26.166zm31.628 1.246a99.825 99.825 0 0 1 12.143-29.29 7.998 7.998 0 0 0 .5-7.442l-6.897-15.531 16.456-16.456 15.533 6.899a7.995 7.995 0 0 0 7.442-.5 99.854 99.854 0 0 1 29.287-12.143 7.998 7.998 0 0 0 5.614-4.908l6.101-15.849h23.271l6.1 15.849a7.996 7.996 0 0 0 5.614 4.908 99.865 99.865 0 0 1 29.287 12.143 7.995 7.995 0 0 0 7.442.5l15.533-6.899 16.456 16.455-6.896 15.527a7.998 7.998 0 0 0 .5 7.442 99.845 99.845 0 0 1 12.144 29.295 8 8 0 0 0 4.909 5.614l15.843 6.098v23.272l-15.848 6.101a8 8 0 0 0-4.909 5.613 99.863 99.863 0 0 1-12.142 29.287 8.002 8.002 0 0 0-.5 7.441l6.899 15.534-16.456 16.456-15.527-6.896a7.995 7.995 0 0 0-7.442.5 99.852 99.852 0 0 1-29.295 12.145 7.996 7.996 0 0 0-5.614 4.908l-6.098 15.843h-23.272l-6.1-15.848a7.997 7.997 0 0 0-5.613-4.908 99.885 99.885 0 0 1-29.288-12.143 8.004 8.004 0 0 0-7.442-.5l-15.533 6.899-16.456-16.456 6.896-15.527a7.998 7.998 0 0 0-.5-7.442 99.854 99.854 0 0 1-12.144-29.295 8 8 0 0 0-4.909-5.613l-15.843-6.099v-23.271l15.846-6.1a7.999 7.999 0 0 0 4.908-5.613zm258.961-107.103c-34.845-43.044-84.367-69.941-139.442-75.739a208.65 208.65 0 0 0-40.133-.344C228.136 25.229 204.566 8 177.033 8c-35.814 0-64.952 29.137-64.952 64.951s29.137 64.952 64.952 64.952 64.952-29.138 64.952-64.952c0-2.623-.175-5.204-.478-7.746a192.717 192.717 0 0 1 34.523.516c50.826 5.35 96.526 30.172 128.682 69.895 32.156 39.722 46.918 89.589 41.568 140.415-3.534 33.577-15.689 65.204-35.33 92.24l-.556-15.473c-.158-4.416-3.848-7.831-8.282-7.708a8 8 0 0 0-7.708 8.282l1.32 36.75a8 8 0 0 0 10.19 7.406l35.363-10.089a8 8 0 0 0-4.39-15.387l-11.273 3.216c20.281-28.769 32.852-62.168 36.578-97.563 5.798-55.076-10.2-109.113-45.044-152.157zm-240.115-3.645c-26.992 0-48.952-21.96-48.952-48.952S150.041 24 177.033 24s48.952 21.959 48.952 48.951-21.96 48.952-48.952 48.952zm26.112-36.584c.685 5.64-.847 10.81-4.43 14.951-3.22 3.722-8.085 6.437-13.682 7.762v.958a8 8 0 0 1-16 0v-1.1c-9.008-2.426-15.84-8.892-18.033-17.684a8 8 0 0 1 15.525-3.871c1.256 5.038 6.735 6.696 11.061 6.601 3.799-.09 7.511-1.378 9.029-3.133.504-.583.807-1.241.647-2.557-.175-1.441-.585-4.818-11.474-6.606-19.393-3.184-22.808-14.334-23.117-20.697-.491-10.12 6.014-18.661 16.362-21.779v-1.252a8 8 0 0 1 16 0v1.18c6.643 1.935 12.796 6.49 16.143 14.461a8.001 8.001 0 0 1-14.752 6.196c-2.479-5.904-8.671-6.226-11.939-5.484-1.42.322-6.037 1.7-5.833 5.904.049 1.019.2 4.12 9.728 5.684 15.086 2.476 23.418 9.363 24.765 20.466zm131.822 288.777c-35.815 0-64.952 29.138-64.952 64.952 0 2.623.174 5.204.478 7.746a193.007 193.007 0 0 1-34.523-.514c-50.826-5.35-96.525-30.173-128.682-69.895-32.155-39.723-46.918-89.59-41.568-140.415 3.537-33.597 15.682-65.208 35.329-92.247l.556 15.479a8 8 0 0 0 15.989-.574l-1.321-36.75a8 8 0 0 0-10.19-7.407l-35.362 10.09a8.001 8.001 0 0 0 4.39 15.387l11.27-3.216c-20.283 28.769-32.846 62.147-36.574 97.561-5.797 55.076 10.199 109.114 45.044 152.158s84.366 69.941 139.442 75.739a209.503 209.503 0 0 0 21.928 1.151c6.088 0 12.165-.271 18.206-.804 9.439 24.236 33.008 41.463 60.54 41.463 35.815 0 64.952-29.138 64.952-64.952s-29.137-64.952-64.952-64.952zm0 113.904c-26.992 0-48.952-21.96-48.952-48.952s21.96-48.952 48.952-48.952 48.952 21.96 48.952 48.952S361.959 488 334.967 488zm26.112-36.586c.685 5.641-.847 10.811-4.429 14.952-3.219 3.722-8.084 6.437-13.683 7.762v.959a8 8 0 0 1-16 0v-1.1c-9.008-2.428-15.841-8.894-18.033-17.685a8 8 0 0 1 15.525-3.871c1.256 5.038 6.756 6.702 11.062 6.602 3.798-.09 7.511-1.379 9.028-3.134.504-.583.807-1.241.647-2.557-.175-1.441-.585-4.818-11.473-6.605-19.395-3.187-22.809-14.336-23.118-20.698-.492-10.12 6.014-18.661 16.362-21.779v-1.252a8 8 0 0 1 16 0v1.18c6.642 1.936 12.796 6.492 16.143 14.463a8 8 0 0 1-14.752 6.194c-2.479-5.904-8.673-6.226-11.938-5.483-1.42.321-6.037 1.699-5.833 5.902.049 1.02.2 4.121 9.729 5.686 15.083 2.474 23.415 9.36 24.763 20.464zM204.271 323.687H307.73c8.799 0 15.958-7.159 15.958-15.958V196.312a8 8 0 0 0-8-8H196.313a8 8 0 0 0-8 8v111.416c0 8.799 7.158 15.959 15.958 15.959zm39.745-119.375h23.969v32.704h-23.969zm-39.703 0h23.703v40.704a8 8 0 0 0 8 8h39.969a8 8 0 0 0 8-8v-40.704h23.706l.039 103.374-103.417.042z" fill="white" data-original="#000000" class=""></path></g></svg>

{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>--}}
                        <span class="nav-link-text ms-3">{{__('project_revenue_planning')}}</span>
                    </a>
                </li>

            @endif

            <!---End Osama Work---->
            <!---Start taher Work---->
            <li class="nav-item mt-3 mb-2">
                <h6 class="ps-4 ms-2 text-uppercase text-muted text-xs opacity-6">{{__('Managing the strategic business plan')}} </h6>
            </li>
            @if(empty($modules) || in_array('brainstorm',$modules))
                <li class="nav-item">
                    <a class="nav-link @if(($selected_navigation ?? '') === 'brainstorm') active @endif" href="/brainstorming-list">

                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-edit-2">
                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                        </svg>
                        <span class="nav-link-text ms-3">{{__('Ideation Canvas')}}</span>
                    </a>
                </li>

            @endif
            @if(empty($modules) || in_array('business_model',$modules))

                <li class="nav-item ">
                    <a class="nav-link @if(($selected_navigation ?? '') === 'business-models') active @endif "
                       href="/business-models">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-briefcase">
                            <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                        </svg>
                        <span class="nav-link-text text-end ms-3 ">{{__('Business Models')}}</span>
                    </a>
                </li>
            @endif
            @if(empty($modules) || in_array('to_dos',$modules))

                <li class="nav-item ">
                    <a class="nav-link @if(($selected_navigation ?? '') === 'todos') active @endif "
                       href="{{route('admin.tasks', ['action' => 'list'])}}">

                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-check-circle">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                        <span class="nav-link-text ms-3">{{__('Tasks')}}</span>
                    </a>
                </li>


            @endif
            @if(empty($modules) || in_array('mckinsey',$modules))
                <li class="nav-item">
                    <a class="nav-link  @if(($selected_navigation ?? '') === 'mckinsey') active @endif" href="/mckinsey-models">


                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        <span class="nav-link-text ms-3">{{__('McKinsey 7-S Model')}}</span>
                    </a>
                </li>

            @endif
            @if(empty($modules) || in_array('calendar',$modules))

                <li class="nav-item">
                    <a class="nav-link @if(($selected_navigation ?? '') === 'calendar') active @endif" href="/calendar">

                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-calendar">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        <span class="nav-link-text ms-3">{{__('Calendar')}}</span>
                    </a>
                </li>
            @endif
            @if(empty($modules) || in_array('notes',$modules))
                <li class="nav-item ">
                    <a class="nav-link @if(($selected_navigation ?? '') === 'notes') active @endif " href="/notes">

                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
                        <span class="nav-link-text ms-3">{{__('Note Book')}}</span>
                    </a>
                </li>
            @endif
            @if(empty($modules) || in_array('documents',$modules))

                <li class="nav-item">
                    <a class="nav-link @if(($selected_navigation ?? '') === 'documents') active @endif"
                       href="/documents">

                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-file">
                            <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                            <polyline points="13 2 13 9 20 9"></polyline>
                        </svg>
                        <span class="nav-link-text ms-3">{{__('Documents')}}</span>
                    </a>
                </li>
            @endif
        <!---End taher Work---->

            <li class="nav-item mt-3 mb-2">
                <h6 class="ps-4 ms-2 text-uppercase text-muted text-xs opacity-6">{{__('invested capital plan')}} </h6>
            </li>

            @if(empty($modules) || in_array('fixed_capital_planning',$modules))
                <li class="nav-item ">
                    <a class="nav-link @if(($selected_navigation ?? '') === 'fixed_capital_planning') active @endif " href="{{ route('fixedInvested.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="20" height="20" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M214.754 301.433c8.354 0 15.15-6.796 15.15-15.149V258.22c0-8.354-6.797-15.15-15.15-15.15H57.456c-8.354 0-15.149 6.797-15.149 15.15v28.063c0 8.354 6.796 15.149 15.149 15.149h157.298zM58.306 259.07h155.599v26.363H58.306zm32.443 60.415H64.025c-8.354 0-15.149 6.796-15.149 15.149v9.296c0 8.354 6.796 15.149 15.149 15.149h26.724c8.354 0 15.149-6.796 15.149-15.149v-9.296c0-8.353-6.796-15.149-15.149-15.149zm-.851 23.595H64.875v-7.595h25.022v7.595zm59.569-23.595h-26.724c-8.354 0-15.149 6.796-15.149 15.149v9.296c0 8.354 6.796 15.149 15.149 15.149h26.724c8.354 0 15.149-6.796 15.149-15.149v-9.296c.001-8.353-6.795-15.149-15.149-15.149zm-.85 23.595h-25.022v-7.595h25.022zm-57.868 26.544H64.025c-8.354 0-15.149 6.797-15.149 15.15v9.295c0 8.354 6.796 15.15 15.149 15.15h26.724c8.354 0 15.149-6.797 15.149-15.15v-9.295c0-8.353-6.796-15.15-15.149-15.15zm-.851 23.595H64.875v-7.596h25.022v7.596zm59.569-23.595h-26.724c-8.354 0-15.149 6.797-15.149 15.15v9.295c0 8.354 6.796 15.15 15.149 15.15h26.724c8.354 0 15.149-6.797 15.149-15.15v-9.295c.001-8.353-6.795-15.15-15.149-15.15zm-.85 23.595h-25.022v-7.596h25.022zm-57.868 26.544H64.025c-8.354 0-15.149 6.796-15.149 15.149v9.295c0 8.354 6.796 15.15 15.149 15.15h26.724c8.354 0 15.149-6.797 15.149-15.15v-9.295c0-8.353-6.796-15.149-15.149-15.149zm-.851 23.595H64.875v-7.595h25.022v7.595zm59.569-23.595h-26.724c-8.354 0-15.149 6.796-15.149 15.149v9.295c0 8.354 6.796 15.15 15.149 15.15h26.724c8.354 0 15.149-6.797 15.149-15.15v-9.295c.001-8.353-6.795-15.149-15.149-15.149zm-.85 23.595h-25.022v-7.595h25.022zm183.292-236.93a8 8 0 0 1-8 8H272.96a8 8 0 0 1 0-16h50.948a8 8 0 0 1 8.001 8zm-26.319 38.874a8 8 0 0 1-8 8h-21.366a8 8 0 0 1 0-16h21.366a8 8 0 0 1 8 8zM204.958 99.944a8 8 0 0 1 8-8H343.91a8 8 0 0 1 0 16H212.958c-4.417 0-8-3.582-8-8zm0 38.875a8 8 0 0 1 8-8h100.949a8 8 0 0 1 0 16H212.958c-4.417 0-8-3.582-8-8zm-65.325 27.048c25.633 0 46.486-20.854 46.486-46.486s-20.854-46.486-46.486-46.486-46.485 20.854-46.485 46.486 20.853 46.486 46.485 46.486zm0-76.972c16.811 0 30.486 13.676 30.486 30.486s-13.676 30.486-30.486 30.486-30.485-13.676-30.485-30.486 13.676-30.486 30.485-30.486zm-20.264 37.013a8 8 0 1 1 11.314-11.313l3.131 3.131 15.052-13.66a8 8 0 0 1 10.752 11.847l-20.695 18.782a7.975 7.975 0 0 1-5.375 2.076 7.98 7.98 0 0 1-5.658-2.343zM490.542 269.96c-10.359-18.191-26-38.665-48.781-63.818 5.932-4.11 9.827-10.961 9.827-18.708 0-10.183-6.725-18.824-15.966-21.716l11.524-11.525c4.362-4.362 6.765-10.177 6.765-16.375s-2.402-12.013-6.764-16.375c-7.559-7.558-19.531-8.918-28.646-3.266-2.416-10.416-11.858-17.945-22.564-17.945-4.198 0-8.192 1.172-11.654 3.21V24.035C384.283 15.194 377.09 8 368.248 8H121.925c-4.344 0-8.264 1.624-11.339 4.696L65.471 57.812c-3.072 3.073-4.696 6.993-4.696 11.338v129.278H47.088c-21.561 0-39.102 17.541-39.102 39.102v227.368C7.987 486.459 25.528 504 47.088 504h448.898a8 8 0 0 0 8-8V340.272a7.952 7.952 0 0 0-1.687-4.901c4.363-21.679.355-44.144-11.757-65.411zm-3.964 62.312h-58.433c1.033-3.232 1.366-6.748.914-10.472-1.696-13.975-12.474-22.688-32.034-25.9-15.913-2.612-16.208-8.689-16.319-10.977-.418-8.604 8.815-11.14 10.671-11.561a20.773 20.773 0 0 1 4.047-.505c.211.007.426.004.635-.007 6.266.031 12.72 2.944 15.718 10.085a8 8 0 1 0 14.752-6.196c-4.642-11.055-13.536-16.958-22.872-19.011v-4.149a8 8 0 0 0-16 0v4.221c-14.373 3.335-23.58 14.525-22.931 27.897.472 9.709 6.008 22.1 29.708 25.99 15.629 2.566 18.227 7.782 18.743 12.04.186 1.537.647 5.428-4.79 8.543h-24.109c-3.37-2.058-5.541-4.964-6.463-8.657a7.996 7.996 0 0 0-9.697-5.826 7.998 7.998 0 0 0-5.826 9.697 30.192 30.192 0 0 0 1.628 4.786h-58.623c-3.593-17.879-.219-36.559 9.938-54.395 10.665-18.724 27.522-40.302 52.875-67.695h55.654c25.354 27.393 42.211 48.972 52.875 67.695 10.157 17.838 13.532 36.519 9.939 54.397zM363.037 180.684h65.802a6.757 6.757 0 0 1 6.749 6.75 6.757 6.757 0 0 1-6.749 6.749h-65.802a6.757 6.757 0 0 1-6.749-6.75 6.757 6.757 0 0 1 6.749-6.749zm55.349-62.353h.053a.956.956 0 0 1 .046.044l-1.937 7.723zm-29.444 3.547c.715-3.271 3.657-5.646 6.995-5.646 3.34 0 6.282 2.375 6.996 5.646 1.119 5.125 4.54 9.216 9.385 11.223 4.849 2.009 10.161 1.534 14.575-1.299 2.818-1.808 6.577-1.407 8.938.955a7.103 7.103 0 0 1 2.078 5.062c0 1.923-.737 3.721-2.078 5.061l-21.805 21.806h-36.178L356.04 142.88c-1.34-1.339-2.077-3.137-2.077-5.06s.737-3.721 2.078-5.061c2.362-2.361 6.12-2.764 8.939-.955 4.414 2.831 9.725 3.306 14.574 1.299 4.849-2.009 8.27-6.099 9.388-11.225zM110.597 35.314v22.508H88.089zM76.78 73.822h37.8c6.627 0 12.018-5.391 12.018-12.018V24.001l241.685.034v91.791c-8.121-2.617-17.331-.605-23.553 5.617-4.362 4.362-6.765 10.177-6.765 16.375s2.402 12.013 6.765 16.374l11.525 11.525c-9.242 2.892-15.967 11.533-15.967 21.716 0 7.747 3.896 14.598 9.827 18.708-22.78 25.153-38.421 45.627-48.782 63.818-11.536 20.256-15.717 41.597-12.32 62.312h-24.788V237.53c0-21.561-17.541-39.102-39.102-39.102h-47.995c-8.697-11.843-22.655-19.048-37.494-19.048s-28.797 7.205-37.494 19.048H76.775zm76.087 124.606H126.4c4.073-1.969 8.588-3.048 13.233-3.048s9.16 1.079 13.234 3.048zm-128.88 266.47V237.53c0-12.739 10.363-23.102 23.102-23.102h178.034c12.738 0 23.102 10.363 23.102 23.102v94.742h-25.092c-1.14-7.233-7.398-12.787-14.946-12.787h-26.724c-8.354 0-15.149 6.796-15.149 15.149v9.296c0 8.354 6.796 15.149 15.149 15.149h15.926v10.544h-15.926c-8.354 0-15.149 6.797-15.149 15.15v9.295c0 8.354 6.796 15.15 15.149 15.15h15.926v10.544h-15.926c-8.354 0-15.149 6.796-15.149 15.149v9.295c0 8.354 6.796 15.15 15.149 15.15h15.926V488h-150.3c-12.739 0-23.102-10.364-23.102-23.102zM197.388 343.08h-15.075v-7.595h16.677a7.956 7.956 0 0 0-1.602 4.787zm0 50.139h-15.075v-7.596h15.075zm0 50.139h-15.075v-7.595h15.075zM487.987 488H213.388V348.272h168.816l.035.002.028-.002h28.031l.028.002.037-.002h77.625V488zM252.175 361.526a8 8 0 0 0-8 8c0 6.68-5.226 12.114-11.648 12.114a8 8 0 0 0-8 8v56.992a8 8 0 0 0 8 8c6.423 0 11.648 5.434 11.648 12.113a8 8 0 0 0 8 8H449.2a8 8 0 0 0 8-8c0-6.68 5.226-12.113 11.648-12.113a8 8 0 0 0 8-8V389.64a8 8 0 0 0-8-8c-6.423 0-11.648-5.435-11.648-12.114a8 8 0 0 0-8-8zm208.673 34.915v43.391c-8.868 2.73-15.866 9.878-18.509 18.914H259.036c-2.643-9.036-9.641-16.184-18.509-18.914v-43.391c8.868-2.73 15.866-9.879 18.509-18.915H442.34c2.642 9.036 9.64 16.185 18.508 18.915zm-143.532 21.696a8 8 0 0 1-8 8h-27.847a8 8 0 0 1 0-16h27.847a8 8 0 0 1 8 8zm110.588 0a8 8 0 0 1-8 8h-27.847a8 8 0 0 1 0-16h27.847a8 8 0 0 1 8 8zm-54.949 9.547c.6 4.933-.746 9.462-3.892 13.099-2.515 2.907-6.176 5.097-10.395 6.319a8 8 0 0 1-15.971-.151c-7.075-2.309-12.396-7.659-14.177-14.802a8 8 0 0 1 15.525-3.869c.985 3.95 6.435 3.937 7.037 3.921 2.715-.064 5.121-1.01 5.879-1.886.1-.115.172-.198.11-.703-.076-.629-.309-2.54-7.64-3.743-16.467-2.704-19.375-12.381-19.643-17.907-.407-8.386 4.681-15.512 12.901-18.477a8 8 0 0 1 15.989-.099c5.574 2.014 10.167 6.212 12.603 12.013a8 8 0 1 1-14.752 6.194c-1.873-4.458-6.911-3.455-7.478-3.328-.795.181-3.38.924-3.283 2.922.085 1.746 4.809 2.656 6.254 2.894 15.852 2.602 20.133 11.009 20.933 17.603z" fill="white" data-original="#000000" class=""></path></g></svg>
                        <span class="nav-link-text text-end ms-3 ">{{__('Fixed capital planning')}}</span>
                    </a>
                </li>
            @endif

            @if(empty($modules) || in_array('working_capital_planning',$modules))
                <li class="nav-item ">
                    <a class="nav-link @if(($selected_navigation ?? '') === 'working_capital_planning') active @endif " href="{{ route('workingInvested.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="20" height="20" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M6.376 289.259v95.092a8 8 0 0 0 8 8h129.1a113.664 113.664 0 0 0-.218 6.906 112.742 112.742 0 1 0 225.484 0c0-2.32-.079-4.621-.218-6.906h129.1a8 8 0 0 0 8-8v-95.092a47.038 47.038 0 0 0-46.985-46.985h-83.113a46.975 46.975 0 0 0-38.985 20.789 46.973 46.973 0 0 0-38.984-20.789h-83.114a46.973 46.973 0 0 0-38.984 20.789 46.975 46.975 0 0 0-38.985-20.789H53.361a47.038 47.038 0 0 0-46.985 46.985zM256 496a96.743 96.743 0 1 1 96.742-96.743A96.851 96.851 0 0 1 256 496zm119.526-237.726h83.113a31.02 31.02 0 0 1 30.985 30.985v87.092h-24.816v-55.975a8 8 0 0 0-16 0v55.975h-63.452v-55.975a8 8 0 0 0-16 0v55.975H366.4a112.365 112.365 0 0 0-21.89-46.849c.014-.2.03-.395.03-.6v-39.643a31.02 31.02 0 0 1 30.986-30.985zm-161.083 0h83.114a31.019 31.019 0 0 1 30.984 30.985v23.767a112.5 112.5 0 0 0-145.082 0v-23.767a31.019 31.019 0 0 1 30.984-30.985zM22.376 289.259a31.02 31.02 0 0 1 30.985-30.985h83.113a31.02 31.02 0 0 1 30.985 30.985v39.946c0 .107.012.21.016.315a112.35 112.35 0 0 0-21.875 46.831h-2.956v-55.975a8 8 0 0 0-16 0v55.975H63.191v-55.975a8 8 0 0 0-16 0v55.975H22.376zM96.153 130.7c-.412-.009-.821-.031-1.236-.031a50.9 50.9 0 1 0 19.49 3.888 30.764 30.764 0 0 1 19.495-6.944h83.114a30.828 30.828 0 0 1 19.486 6.947 50.875 50.875 0 1 0 39 0 30.861 30.861 0 0 1 19.479-6.95H378.1a30.864 30.864 0 0 1 19.475 6.952 50.861 50.861 0 1 0 19.508-3.9c-.42 0-.835.022-1.253.032a46.981 46.981 0 0 0-37.73-19.088h-83.116a46.96 46.96 0 0 0-37.732 19.094c-.417-.01-.832-.032-1.252-.032s-.83.022-1.245.032a46.907 46.907 0 0 0-37.739-19.088H133.9A46.791 46.791 0 0 0 96.153 130.7zm33.639 50.844a34.875 34.875 0 1 1-34.875-34.875 34.915 34.915 0 0 1 34.875 34.871zm322.165 0a34.875 34.875 0 1 1-34.875-34.875 34.914 34.914 0 0 1 34.875 34.871zm-161.082 0A34.875 34.875 0 1 1 256 146.665a34.915 34.915 0 0 1 34.875 34.875zM175.459 101.75a50.875 50.875 0 1 0-50.875-50.875 50.932 50.932 0 0 0 50.875 50.875zm0-85.75a34.875 34.875 0 1 1-34.875 34.875A34.914 34.914 0 0 1 175.459 16zm161.083 85.75a50.875 50.875 0 1 0-50.875-50.875 50.933 50.933 0 0 0 50.875 50.875zm0-85.75a34.875 34.875 0 1 1-34.875 34.875A34.915 34.915 0 0 1 336.542 16zM256 312.867a86.391 86.391 0 1 0 86.391 86.39A86.488 86.488 0 0 0 256 312.867zm0 156.781a70.391 70.391 0 1 1 70.391-70.391A70.471 70.471 0 0 1 256 469.648zm16.072-92.619a8 8 0 0 0 16 0c0-14.066-10.245-25.919-24.072-29.277v-6.567a8 8 0 1 0-16 0v6.567c-13.827 3.358-24.072 15.211-24.072 29.277s10.245 25.918 24.072 29.277v27.5c-4.816-2.46-8.072-7.057-8.072-12.324a8 8 0 0 0-16 0c0 14.067 10.245 25.919 24.072 29.278v6.567a8 8 0 0 0 16 0v-6.567c13.827-3.359 24.072-15.211 24.072-29.278S277.827 395.568 264 392.21v-27.5c4.816 2.456 8.072 7.053 8.072 12.319zm-32.144 0c0-5.266 3.256-9.863 8.072-12.323v24.646c-4.816-2.46-8.072-7.052-8.072-12.323zm32.144 44.457c0 5.267-3.256 9.864-8.072 12.324v-24.646c4.816 2.46 8.072 7.056 8.072 12.322z" fill="white" data-original="#000000" class=""></path></g></svg>
                        <span class="nav-link-text text-end ms-3 ">{{__('Working capital planning')}}</span>
                    </a>
                </li>
            @endif

            @if(empty($modules) || in_array('investors',$modules))
                <li class="nav-item ">
                    <a class="nav-link @if(($selected_navigation ?? '') === 'invested_capital_planning') active @endif " href="/investors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
                        <span class="nav-link-text text-end ms-3 ">{{__('Invested capital planning')}}</span>
                    </a>
                </li>
            @endif


{{--            @if(empty($modules) || in_array('invested_capital_plan',$modules))--}}

{{--                <li class="nav-item ">--}}
{{--                    <a class="nav-link @if(($selected_navigation ?? '') === 'investors') active @endif " href="/investors">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>--}}
{{--                        <span class="nav-link-text text-end ms-3 ">{{__('Investors')}}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endif--}}


            <li class="nav-item mt-3 mb-2">
                <h6 class="ps-4 ms-2 text-uppercase text-muted text-xs opacity-6">{{__('financial projections')}} </h6>
            </li>

            @if(empty($modules) || in_array('planning_cost_assumptions',$modules))
                <li class="nav-item ">
                    <a class="nav-link @if(($selected_navigation ?? '') === 'planning_cost_assumptions') active @endif " href="/planning_cost_assumptions">
                        <img src="{{asset('img/process.png')}}" height="20" width="20" class="bg-white">
                        <span class="nav-link-text text-end ms-3 ">{{__('Planning cost assumptions')}}</span>
                    </a>
                </li>
            @endif
            @if(empty($modules) || in_array('planning_financial_assumptions',$modules))
                <li class="nav-item ">
                    <a class="nav-link @if(($selected_navigation ?? '') === 'planning_financial_assumptions') active @endif " href="/planning_financial_assumptions">
                        <img src="{{asset('img/productivity.png')}}" height="20" width="20" class="bg-white">
                        <span class="nav-link-text text-end ms-3 ">{{__('Planning financial assumptions')}}</span>
                    </a>
                </li>
            @endif
            @if(empty($modules) || in_array('planning_revenue_operating_assumptions',$modules))
                <li class="nav-item ">
                    <a class="nav-link @if(($selected_navigation ?? '') === 'planning_revenue_operating_assumptions') active @endif " href="/planning_revenue_operating_assumptions">
                        <img src="{{asset('img/time.png')}}" height="20" width="20" class="bg-white">
                        <span class="nav-link-text text-end ms-3 ">{{__('Planning revenue operating assumptions')}}</span>
                    </a>
                </li>
            @endif





{{--            <li class="nav-item mt-3 mb-2">--}}
{{--                <h6 class="ps-4 ms-2 text-uppercase text-muted text-xs opacity-6">{{__('Strategies & Analysis')}} </h6>--}}
{{--            </li>--}}

{{--            @if(empty($modules) || in_array('pest',$modules))--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link  @if(($selected_navigation ?? '') === 'pest') active @endif" href="/pest-list">--}}

{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>--}}
{{--                        <span class="nav-link-text ms-3">{{__('PEST Analysis')}}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--            @endif--}}



{{--            @if(empty($modules) || in_array('business_plan',$modules))--}}

{{--                <li class="nav-item ">--}}
{{--                    <a class="nav-link @if(($selected_navigation ?? '') === 'business-plans') active @endif "--}}
{{--                       href="/business-plans">--}}

{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"--}}
{{--                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                             class="feather feather-edit">--}}
{{--                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>--}}
{{--                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>--}}
{{--                        </svg>--}}
{{--                        <span class="nav-link-text  ms-3">{{__('Business Plans')}}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--            @endif--}}
{{--            @if(empty($modules) || in_array('marketing_plan',$modules))--}}

{{--                <li class="nav-item ">--}}
{{--                    <a class="nav-link @if(($selected_navigation ?? '') === 'marketing-plans') active @endif " href="/marketing-plans">--}}

{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>--}}
{{--                        <span class="nav-link-text ms-3">{{__('Marketing Plans')}}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--            @endif--}}

            <li class="nav-item mt-3 mb-2">
                <h6 class="ps-4 ms-2 text-uppercase text-muted text-xs opacity-6">{{ __('financial reports') }}</h6>
            </li>
            @if(empty($modules) || in_array('PlanningRevenueOperatingAssumptions',$modules))
            <li class="nav-item">
                <a class="nav-link @if(($selected_navigation ?? '') === 'PlanningRevenueOperatingAssumptions') active @endif  " href="{{ route('planning_revenue_operating_assumptions.get') }}">
                    <img src="{{asset('img/market-analysis.png')}}" height="20" width="20" class="bg-white">
                    <span class="nav-link-text ms-3">توقعات الإيرادات</span>
                </a>
            </li>
            @endif
            @if(empty($modules) || in_array('IncomeList',$modules))
            <li class="nav-item">
                <a class="nav-link @if(($selected_navigation ?? '') === 'IncomeList') active @endif  " href="{{ route('incomeList.get') }}">
                    <img src="{{asset('img/report.png')}}" height="20" width="20" class="bg-white">
                    <span class="nav-link-text ms-3"> قائمة الدخل</span>
                </a>
            </li>
            @endif
            @if(empty($modules) || in_array('statement_of_cash_flows',$modules))
            <li class="nav-item">
                <a class="nav-link @if(($selected_navigation ?? '') === 'statement_of_cash_flows') active @endif  " href="{{ route('statementOfCashFlows.get') }}">
                    <img src="{{asset('img/cash-flow.png')}}" height="20" width="20" class="bg-white">
                    <span class="nav-link-text ms-3">قائمة التدفقات النقدية</span>
                </a>
            </li>
            @endif
            @if(empty($modules) || in_array('capital_investment_model',$modules))
            <li class="nav-item">
                <a class="nav-link @if(($selected_navigation ?? '') === 'capital_investment_model') active @endif  " href="{{ route('capital_investment_model.get') }}">
                    <img src="{{asset('img/insight.png')}}" height="20" width="20" class="bg-white">
                    <span class="nav-link-text ms-3"> نموذج الاستثمار الرأسمالي</span>
                </a>
            </li>
            @endif
            @if(empty($modules) || in_array('textReport',$modules))
            <li class="nav-item">
                <a class="nav-link @if(($selected_navigation ?? '') === 'textReport') active @endif  " href="{{ route('textReport.get') }}">
                    <img src="{{asset('img/reports.svg')}}" height="20" width="20" class="bg-white">
                    <span class="nav-link-text ms-3"> التقارير النصية</span>
                </a>
            </li>
            @endif
            <li class="nav-item mt-3 mb-2">
                <h6 class="ps-4 ms-2 text-uppercase text-muted text-xs opacity-6"> </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(($selected_navigation ?? '') === 'billing') active @endif  " href="{{ route('myPlan.index') }}">

                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-shopping-cart">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                    <span class="nav-link-text ms-3">{{__('My Plan')}}</span>
                </a>
            </li>

            <li class="nav-item mt-3 mb-2">
                <h6 class="ps-4 ms-2 text-uppercase text-muted text-xs opacity-6">{{__('Account pages')}} </h6>
            </li>

            <li class="nav-item">
                <a class="nav-link @if(($selected_navigation ?? '') === 'profile') active @endif " href="/profile">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-user">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <span class="nav-link-text ms-3">{{__('Profile')}}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->path() === 'user/package') active @endif " href="/user/package">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-user">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <span class="nav-link-text ms-3">الاشتراك ف الباقة</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->path() === 'user/notifications') active @endif " href="/user/notifications">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-user">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <span class="nav-link-text ms-3"> <strong class="pr-2 text-danger" id="user_notification_count" style="padding-left: 5px">{{auth()->user()->notifications()->where('read_at', null)->count()}}</strong>الاشعارات</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(($selected_navigation ?? '') === 'team') active @endif " href="/staff">

                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-database">
                        <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                        <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                        <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                    </svg>
                    <span class="nav-link-text ms-3">{{__('Users')}}</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link @if(request()->path() === 'user/chat') active @endif " href="/user/chat">

                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-database">
                        <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                        <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                        <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                    </svg>
                    <span class="nav-link-text ms-3">{{__('جلسات دعم ومساعدة')}}</span>
                </a>
            </li>

            <li class="nav-item mt-3 mb-2">
                <h6 class="ps-4 ms-2 text-uppercase text-muted text-xs opacity-6">{{__('Settings')}}  </h6>
            </li>

            <li class="nav-item mb-4">
                <a class="nav-link @if(($selected_navigation ?? '') === 'settings') active @endif  " href="/settings">

                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-command">
                        <path
                            d="M18 3a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3H6a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3V6a3 3 0 0 0-3-3 3 3 0 0 0-3 3 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 3 3 0 0 0-3-3z"></path>
                    </svg>
                    <span class="nav-link-text ms-3">{{__('Settings')}}</span>
                </a>
            </li>

            <li class="mb-4 ms-5">
                <a class="btn btn-info" type="button" href="/logout">
                    <span class="">{{__('Logout')}}</span>
                </a>
            </li>
        </ul>
    </div>

</aside>


<main class="main-content mt-1 border-radius-lg ">
    <!-- Navbar -->

    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl d-print-none" navbar-scroll="true" >
        <div class="container-fluid py-1 px-3 d-print-none">

            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                </div>
                <ul class=" justify-content-end">
                    <li class="nav-item d-xl-none pe-2 ps-3 d-flex align-items-center">
                        <a href="javascript:" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item dropdown pe-2 d-flex align-items-center">
                        <a href="" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown"
                           aria-expanded="false">
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                            aria-labelledby="dropdownMenuButton">
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="/profile">
                                    <div class="d-flex py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span class="font-weight-bold">{{__('My Profile')}}</span>
                                            </h6>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item border-radius-md" href="/logout">
                                    <div class="d-flex py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-bolder mb-1">
                                                {{__('Logout')}}
                                            </h6>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- End Navbar -->
    <div class="container-fluid ">
        @yield('content')
    </div>
</main>
<!--   Core JS Files   -->
<script src="{{PUBLIC_DIR}}/js/app.js?v=99"></script>
<script src="{{PUBLIC_DIR}}/lib/tinymce/tinymce.min.js?v=57"></script>
<script>
    (function(){
        "use strict";

        var win = navigator.platform.indexOf('Win') > -1;

        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    })();
</script>
<script src="https://cdn.jsdelivr.net/combine/npm/snapsvg@0.5.1,npm/frappe-gantt@0.5.0/dist/frappe-gantt.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })


    @if(\Illuminate\Support\Facades\Session::has('success'))
    Toast.fire({
        icon: 'success',
        title: '{!! \Illuminate\Support\Facades\Session::get('success') !!}'
    });
    @elseif(\Illuminate\Support\Facades\Session::has('error'))
    Toast.fire({
        icon: 'error',
        title: '{!! \Illuminate\Support\Facades\Session::get('error') !!}'
    });
    @endif

</script>
@yield('script')

</body>

</html>

