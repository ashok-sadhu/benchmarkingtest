<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('BD') }}</a>
            <a href="#" class="simple-text logo-normal">{{ __('Black Dashboard') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('dashboard') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Laravel Examples') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            
                        </li>
                    </ul>
                </div>
            </li>
            <li @if ($pageSlug == 'icons') class="active " @endif>
                
            </li>
            <li @if ($pageSlug == 'maps') class="active " @endif>
                
            </li>
            <li @if ($pageSlug == 'notifications') class="active " @endif>
                
            </li>
            
        </ul>
    </div>
</div>
