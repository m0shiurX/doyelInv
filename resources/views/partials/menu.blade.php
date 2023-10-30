<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('factory_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/add-to-stocks*") ? "c-show" : "" }} {{ request()->is("admin/productions*") ? "c-show" : "" }} {{ request()->is("admin/stocks*") ? "c-show" : "" }} {{ request()->is("admin/stock-histories*") ? "c-show" : "" }} {{ request()->is("admin/stock-wastages*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-industry c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.factory.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('add_to_stock_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.productions.create") }}" class="c-sidebar-nav-link {{ request()->is("admin/add-to-stocks") || request()->is("admin/add-to-stocks/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-plus c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.addToStock.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('production_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.productions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/productions") || request()->is("admin/productions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-history c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.production.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('stock_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.stocks.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/stocks") || request()->is("admin/stocks/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-database c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.stock.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('stock_history_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.stock-histories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/stock-histories") || request()->is("admin/stock-histories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-history c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.stockHistory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('stock_wastage_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.stock-wastages.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/stock-wastages") || request()->is("admin/stock-wastages/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-contract c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.stockWastage.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('customer_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/add-customers*") ? "c-show" : "" }} {{ request()->is("admin/crm-customers*") ? "c-show" : "" }} {{ request()->is("admin/payments*") ? "c-show" : "" }} {{ request()->is("admin/customer-dues*") ? "c-show" : "" }} {{ request()->is("admin/customers-opening-balances*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.customer.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('add_customer_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.crm-customers.create") }}" class="c-sidebar-nav-link {{ request()->is("admin/add-customers") || request()->is("admin/add-customers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-plus c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.addCustomer.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('crm_customer_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.crm-customers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/crm-customers") || request()->is("admin/crm-customers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.crmCustomer.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('payment_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.payments.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/payments") || request()->is("admin/payments/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-money-bill-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.payment.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('customer_due_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.customer-dues.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/customer-dues") || request()->is("admin/customer-dues/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-credit-card c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.customerDue.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('customers_opening_balance_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.customers-opening-balances.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/customers-opening-balances") || request()->is("admin/customers-opening-balances/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.customersOpeningBalance.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('invoice_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/new-sales*") ? "c-show" : "" }} {{ request()->is("admin/sells*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-sticky-note c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.invoice.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('new_sale_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sells.create") }}" class="c-sidebar-nav-link {{ request()->is("admin/new-sales") || request()->is("admin/new-sales/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cart-plus c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.newSale.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('sell_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sells.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sells") || request()->is("admin/sells/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-shopping-cart c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.sell.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('basic_c_r_m_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/crm-statuses*") ? "c-show" : "" }} {{ request()->is("admin/crm-notes*") ? "c-show" : "" }} {{ request()->is("admin/crm-documents*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cog c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.basicCRM.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('crm_status_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.crm-statuses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/crm-statuses") || request()->is("admin/crm-statuses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-folder c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.crmStatus.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('crm_note_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.crm-notes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/crm-notes") || request()->is("admin/crm-notes/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-sticky-note c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.crmNote.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('crm_document_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.crm-documents.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/crm-documents") || request()->is("admin/crm-documents/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-folder c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.crmDocument.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-toolbox c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>
