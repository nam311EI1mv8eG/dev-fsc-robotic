<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('audit_log_access')
                            <li class="{{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                <a href="{{ route("admin.audit-logs.index") }}">
                                    <i class="fa-fw fas fa-file-alt">

                                    </i>
                                    <span>{{ trans('cruds.auditLog.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('content_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-book">

                        </i>
                        <span>{{ trans('cruds.contentManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('content_category_access')
                            <li class="{{ request()->is("admin/content-categories") || request()->is("admin/content-categories/*") ? "active" : "" }}">
                                <a href="{{ route("admin.content-categories.index") }}">
                                    <i class="fa-fw fas fa-folder">

                                    </i>
                                    <span>{{ trans('cruds.contentCategory.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('content_tag_access')
                            <li class="{{ request()->is("admin/content-tags") || request()->is("admin/content-tags/*") ? "active" : "" }}">
                                <a href="{{ route("admin.content-tags.index") }}">
                                    <i class="fa-fw fas fa-tags">

                                    </i>
                                    <span>{{ trans('cruds.contentTag.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('content_page_access')
                            <li class="{{ request()->is("admin/content-pages") || request()->is("admin/content-pages/*") ? "active" : "" }}">
                                <a href="{{ route("admin.content-pages.index") }}">
                                    <i class="fa-fw fas fa-file">

                                    </i>
                                    <span>{{ trans('cruds.contentPage.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('thidaurobotic_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.thidaurobotic.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('season_access')
                            <li class="{{ request()->is("admin/seasons") || request()->is("admin/seasons/*") ? "active" : "" }}">
                                <a href="{{ route("admin.seasons.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.season.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('match_access')
                            <li class="{{ request()->is("admin/matches") || request()->is("admin/matches/*") ? "active" : "" }}">
                                <a href="{{ route("admin.matches.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.match.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('score_detail_access')
                            <li class="{{ request()->is("admin/score-details") || request()->is("admin/score-details/*") ? "active" : "" }}">
                                <a href="{{ route("admin.score-details.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.scoreDetail.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('team_access')
                            <li class="{{ request()->is("admin/teams") || request()->is("admin/teams/*") ? "active" : "" }}">
                                <a href="{{ route("admin.teams.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.team.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('match_team_access')
                            <li class="{{ request()->is("admin/match-teams") || request()->is("admin/match-teams/*") ? "active" : "" }}">
                                <a href="{{ route("admin.match-teams.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.matchTeam.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="{{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                        <a href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>
    </section>
</aside>