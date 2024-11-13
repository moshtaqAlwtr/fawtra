<div class="h-100 " id="leftside-menu-container"  data-simplebar>

    <!--- Sidemenu -->

      <ul class="side-nav">

        <li class="side-nav-title side-nav-item">Navigation</li>

        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards"
                class="side-nav-link">
                <i class="uil-home-alt"></i>
                <span class="badge bg-success float-end">4</span>
                <span> {{ trans('main_trans.Dashboards') }} </span>
            </a>
            <div class="collapse" id="sidebarDashboards">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="{{ route('human_resources') }}">{{ trans('main_trans.Human_Resources') }}</a>
                    <li>
                        <a href=""> {{ trans('main_trans.sales') }}</a>
                    </li>

                </ul>
            </div>
        </li>

        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce"
                class="side-nav-link">
                <i class="uil-store"></i>
                <span> {{ trans('main_trans.sales') }} </span>
                <span class="badge bg-success">4</span>
            </a>
            <div class="collapse" id="sidebarEcommerce">
                <ul class="side-nav-second-level">
                    <li>
                         <a href="{{ route('invoice-management') }}">{{ trans('main_trans.invoice_management') }}</a>

                    </li>
                    <li>
                        <a href="">{{ trans('main_trans.creaat_invoice') }}</a>
                    </li>
                    <li>
                       <a href="">{{ trans('main_trans.Quotation_Management') }}</a>
                    </li>
                    <li>
                        <a href="">{{ trans('main_trans.Create_quote') }}</a>
                    </li>
                    <li>
                        <a href="">{{ trans('main_trans.Credit_notes') }}</a>

                    </li>
                    <li>

            <a href="">{{ trans('main_trans.Returned_invoices') }}</a>

                    </li>
                    <li>
                        <a href="">{{ trans('main_trans.Periodic_invoices') }}</a>
                    </li>
                    <li>
                        <a href="">{{ trans('main_trans.Returned_invoices') }}</a>


                    </li>
                    <li>
                        <a href="">{{ trans('main_trans.Periodic_invoices') }}</a>


                    </li>
                    <li>
                        <a href="">{{ trans('main_trans.Customer_payments') }}</a>


                    </li>
                    <li>
                        <a href="">{{ trans('main_trans.Sales_Settings') }}</a>


                    </li>

                </ul>
            </div>
        </li>



        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarCrm" aria-expanded="false" aria-controls="sidebarCrm"
                class="side-nav-link">
                <i class="uil uil-tachometer-fast"></i>
                <span class="badge bg-danger text-white float-end"></span>
                <span>{{ trans('main_trans.Online_store') }}</span>
            </a>
            <div class="collapse" id="sidebarCrm">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="" >{{ trans('main_trans.Content_management') }}</a>
                    </li>
                    <li>
                        <a href=""  >{{ trans('main_trans.Settings') }}</a>
                    </li>


                </ul>
            </div>
        </li>

        {{-- الحجوزات --}}
        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#reservations" aria-expanded="false" aria-controls="reservations" class="side-nav-link">
                <i class="uil-store"></i>
                <span class="menu-arrow"></span>
                <span> {{ trans('main_trans.Reservations') }} </span>
            </a>
            <div class="collapse" id="reservations">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="">{{ trans('main_trans.Manage_reservations') }}</a>
                    </li>
                    <li>
                        <a href="">{{ trans('main_trans.Add_reservation') }}</a>
                    </li>
                    <li>
                        <a href="">{{ trans('main_trans.Booking_Settings') }}</a>
                    </li>

                </ul>
            </div>
        </li>


        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail"
                class="side-nav-link">
                <i class="uil-envelope"></i>
                <span> {{ trans('main_trans.Installment_Management') }} </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarEmail">
                <ul class="side-nav-second-level">
                    <li>
                        <a href=""> {{ trans('main_trans.Installment_agreements') }}</a>
                    </li>
                    <li>
                        <a href="">{{ trans('main_trans.Installments') }} </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarProjects" aria-expanded="false" aria-controls="sidebarProjects"
                class="side-nav-link">
                <i class="uil-briefcase"></i>
                <span> {{ trans('main_trans.Targeted_sales_and_commissions') }} </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarProjects">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="">{{ trans('main_trans.Commission_rules') }}</a>
                    </li>
                    <li>
                        <a href="">{{ trans('main_trans.Sales_commissions') }}</a>
                    </li>
                    <li>
                        <a href="">{{ trans('main_trans.Sales_periods') }} <span
                                class="badge rounded-pill bg-light text-dark font-10 float-end"></span></a>
                    </li>

                </ul>
            </div>
        </li>

        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarTasks" aria-expanded="false" aria-controls="sidebarTasks"
                class="side-nav-link">
                <i class="uil-clipboard-alt"></i>
                <span> {{ trans('main_trans.Units_and_Rentals_Management') }} </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarTasks">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="">{{ trans('main_trans.Units') }}</a>
                    </li>
                    <li>
                        <a href="">{{ trans('main_trans.Seizure_orders') }}</a>
                    </li>
                    <li>
                        <a href="">{{ trans('main_trans.Pricing_rules') }}</a>
                    </li>
                    <li>
                        <a href="">{{ trans('main_trans.Seasonal_prices') }}</a>
                    </li>
                    <li>
                        <a href="">{{ trans('main_trans.Settings') }}</a>
                    </li>
                </ul>
            </div>


        </li>
        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarTasks" aria-expanded="false" aria-controls="sidebarTasks"
                class="side-nav-link">
                <i class="uil-clipboard-alt"></i>
                <span> {{ trans('main_trans.Supply_orders') }} </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarTasks">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="">{{ trans('main_trans.Supply_orders') }}</a>
                    </li>
                    <li>
                        <a href="">{{ trans('main_trans.Add_a_job_order') }}</a>
                    </li>
                    <li>
                        <a href="">{{ trans('main_trans.Supply_Orders_Settings') }}</a>
                    </li>
                </ul>
            </div>


        </li>




        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarLayouts" aria-expanded="false" aria-controls="sidebarLayouts"
                class="side-nav-link">
                <i class="uil-window"></i>
                <span> {{ trans('main_trans.Business_cycles') }} </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarLayouts">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="">{{ trans('main_trans.Settings') }}</a>
                    </li>

                </ul>
            </div>


        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarBaseUI" aria-expanded="false" aria-controls="sidebarBaseUI"
                class="side-nav-link">
                <i class="uil-box"></i>
                <span> {{ trans('main_trans.Customers') }}  </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarBaseUI">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="">{{trans('main_trans.Customer_management')}}</a>
                    </li>
                    <li>
                        <a href="">{{ trans('main_trans.Add_a_new_customer') }}</a>
                    </li>
                    <li>
                        <a href="">{{ trans('main_trans.Appointments')}}</a>
                    </li>
                    <li>
                        <a href="">{{ trans('main_trans.Contact_list')}}</a>
                    </li>
                    <li>
                        <a href="">{{ trans('main_trans.Customer_relationship_management') }}</a>
                    </li>
                    <li>
                        <a href="">{{ trans('main_trans.Client_settings') }}</a>
                    </li>

                </ul>
            </div>
        </li>

        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarExtendedUI" aria-expanded="false"
                aria-controls="sidebarExtendedUI" class="side-nav-link">
                <i class="uil-package"></i>
                <span> {{ trans('main_trans.Points_and_credits')}}  </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarExtendedUI">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="">{{ trans('main_trans.Managing_balance_transfers') }}</a>
                    </li>
                    <li>
                        <a href="">{{ trans('main_trans.Managing_consumption_balances') }} </a>
                    </li>
                    <li>
                        <a href="">{{ trans('main_trans.Package_management') }}</a>
                    </li>
                    <li>
                        <a href="">{{ trans('main_trans.Settings') }}</a>
                    </li>
                </ul>
            </div>
        </li>



        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarIcons" aria-expanded="false" aria-controls="sidebarIcons"
                class="side-nav-link">
                <i class="uil-streering"></i>
                <span> {{ trans('main_trans.Loyalty_points') }} </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarIcons">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="">{{ trans('main_trans.Customer_loyalty_rules') }}</a>
                    </li>
                    <li>
                        <a href="">{{ trans('main_trans.Settings') }}</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarForms" aria-expanded="false" aria-controls="sidebarForms"
                class="side-nav-link">
                <i class="uil-document-layout-center"></i>
                <span> {{ trans('main_trans.Memberships') }} </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarForms">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="">{{ trans('main_trans.Membership_management') }}</a>
                    </li>
                    <li>
                        <a href="">{{ trans('main_trans.Subscription_management') }}</a>
                    </li>
                    <li>
                        <a href="">{{ trans('main_trans.Settings') }}</a>
                    </li>
                    <li>

                </ul>
            </div>
        </li>



        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarTables" aria-expanded="false" aria-controls="sidebarTables"
                class="side-nav-link">
                <i class="uil-table"></i>
                <span>  {{ trans('main_trans.Customer_attendance') }}</span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarTables">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="">{{ trans('main_trans.Customer_attendance_records') }} </a>
                    </li>

                </ul>
            </div>
        </li>

        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarMaps" aria-expanded="false" aria-controls="sidebarMaps"
                class="side-nav-link">
                <i class="uil-location-point"></i>
                <span>{{ trans('main_trans.Insurance_Agents') }}  </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarMaps">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="">{{ trans('main_trans.Insurance_Agents_Management') }}  </a>
                    </li>
                    <li>
                        <a href=""> {{ trans('main_trans.Add_Insurance_Company') }} </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarMultiLevel" aria-expanded="false"
                aria-controls="sidebarMultiLevel" class="side-nav-link">
                <i class="uil-folder-plus"></i>
                <span>{{ trans('main_trans.Stock') }}  </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarMultiLevel">
                <ul class="side-nav-second-level">
                    <li class="side-nav-item">
                        <a href="">
                            <span> {{ trans('main_trans.products_management') }} </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="">
                            <span> {{ trans('main_trans.Store_permissions_management') }} </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="">
                            <span> {{ trans('main_trans.product_tracking') }} </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="">
                            <span> {{ trans('main_trans.price_lists') }} </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="">
                            <span> {{ trans('main_trans.warehouses') }} </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="">
                            <span> {{ trans('main_trans.inventory_Management') }} </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="">
                            <span> {{ trans('main_trans.products_Settings') }} </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="">
                            <span> {{ trans('main_trans.inventory_settings') }} </span>
                        </a>
                    </li>
                </ul>
            </div>

        </li>
        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarMultiLevel" aria-expanded="false"
                aria-controls="sidebarMultiLevel" class="side-nav-link">
                <i class="uil-folder-plus"></i>
                <span>{{ trans('main_trans.Purchases') }}  </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarMultiLevel">
                <ul class="side-nav-second-level">
                    <li class="side-nav-item">
                        <a href="">
                            <span> {{ trans('main_trans.Purchase_Orders') }} </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="">
                            <span> {{ trans('main_trans.Quotation_Requests') }} </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="">
                            <span> {{ trans('main_trans.Purchase_Quotations') }} </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="">
                            <span> {{ trans('main_trans.Purchase_Orders') }} </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="">
                            <span> {{ trans('main_trans.Purchase_Invoices') }} </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="">
                            <span> {{ trans('main_trans.Purchase_Returns') }} </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="">
                            <span> {{ trans('main_trans.Creditor_notices') }} </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="">
                            <span> {{ trans('main_trans.Supplier_Management') }} </span>
                        </a>
                    </li>
                    <!-- مدفوعات الموردين -->
<li class="side-nav-item">
    <a href="">
        <span> {{ trans('main_trans.Supplier_Payments') }} </span>
    </a>
</li>

<!-- إعدادات فواتير الشراء -->
<li class="side-nav-item">
    <a href="">
        <span> {{ trans('main_trans.Purchase_Invoices_Settings') }} </span>
    </a>
</li>

<!-- إعدادات الموردين -->
<li class="side-nav-item">
    <a href="">
        <span> {{ trans('main_trans.Supplier_Settings') }} </span>
    </a>
</li>
                </ul>
            </div>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#timeTrackingMenu" aria-expanded="false"
                    aria-controls="timeTrackingMenu" class="side-nav-link">
                    <i class="uil-clock"></i>
                    <span>{{ trans('main_trans.Time_Tracking') }} </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="timeTrackingMenu">
                    <ul class="side-nav-second-level">
                        <!-- تتبع الوقت -->
                        <li class="side-nav-item">
                            <a href="">
                                <span>{{ trans('main_trans.Time_Tracking') }}</span>
                            </a>
                        </li>

                        <!-- إنشاء فاتورة -->
                        <li class="side-nav-item">
                            <a href="">
                                <span>{{ trans('main_trans.Create_Invoice') }}</span>
                            </a>
                        </li>

                        <!-- إعدادات تتبع الوقت -->
                        <li class="side-nav-item">
                            <a href="">
                                <span>{{ trans('main_trans.Time_Tracking_Settings') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#financialMenu" aria-expanded="false" aria-controls="financialMenu" class="side-nav-link">
                    <i class="uil uil-money-bill"></i> <!-- أيقونة المالية -->
                    <span>{{ trans('main_trans.Financial') }}</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="financialMenu">
                    <ul class="side-nav-second-level">
                        <!-- المصروفات -->
                        <li class="side-nav-item">
                            <a href="">
                                <span>{{ trans('main_trans.Expenses') }}</span>
                            </a>
                        </li>
                        <!-- سندات القبض -->
                        <li class="side-nav-item">
                            <a href="">
                                <span>{{ trans('main_trans.Receipts') }}</span>
                            </a>
                        </li>
                        <!-- خزائن وحسابات بنكية -->
                        <li class="side-nav-item">
                            <a href="">
                                <span>{{ trans('main_trans.Cash_and_Bank_Accounts') }}</span>
                            </a>
                        </li>
                        <!-- إعدادات المالية -->
                        <li class="side-nav-item">
                            <a href="">
                                <span>{{ trans('main_trans.Financial_Settings') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#generalAccountsMenu" aria-expanded="false" aria-controls="generalAccountsMenu" class="side-nav-link">
                    <i class="uil uil-chart-pie-alt"></i> <!-- أيقونة الحسابات العامة -->
                    <span>{{ trans('main_trans.General_Accounts') }}</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="generalAccountsMenu">
                    <ul class="side-nav-second-level">
                        <!-- القيود اليومية -->
                        <li class="side-nav-item">
                            <a href="">
                                <span>{{ trans('main_trans.Journal_Entries') }}</span>
                            </a>
                        </li>
                        <!-- أضف قيد -->
                        <li class="side-nav-item">
                            <a href="">
                                <span>{{ trans('main_trans.Add_Entry') }}</span>
                            </a>
                        </li>
                        <!-- دليل الحسابات -->
                        <li class="side-nav-item">
                            <a href="">
                                <span>{{ trans('main_trans.Chart_of_Accounts') }}</span>
                            </a>
                        </li>
                        <!-- مراكز التكلفة -->
                        <li class="side-nav-item">
                            <a href="">
                                <span>{{ trans('main_trans.Cost_Centers') }}</span>
                            </a>
                        </li>
                        <!-- الأصول -->
                        <li class="side-nav-item">
                            <a href="">
                                <span>{{ trans('main_trans.Assets') }}</span>
                            </a>
                        </li>
                        <!-- إعدادات الحسابات العامة -->
                        <li class="side-nav-item">
                            <a href="">
                                <span>{{ trans('main_trans.General_Accounts_Settings') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#chequesCycleMenu" aria-expanded="false" aria-controls="chequesCycleMenu" class="side-nav-link">
                    <i class="uil uil-receipt"></i> <!-- أيقونة دورة الشيكات -->
                    <span>{{ trans('main_trans.Cheques_Cycle') }}</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="chequesCycleMenu">
                    <ul class="side-nav-second-level">
                        <!-- الشيكات المدفوعة -->
                        <li class="side-nav-item">
                            <a href="">
                                <span>{{ trans('main_trans.Paid_Cheques') }}</span>
                            </a>
                        </li>
                        <!-- الشيكات المستلمة -->
                        <li class="side-nav-item">
                            <a href="">
                                <span>{{ trans('main_trans.Received_Cheques') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#ordersMenu" aria-expanded="false" aria-controls="ordersMenu" class="side-nav-link">
                    <i class="uil uil-clipboard-alt"></i> <!-- أيقونة الطلبات -->
                    <span>{{ trans('main_trans.Orders') }}</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="ordersMenu">
                    <ul class="side-nav-second-level">
                        <!-- إدارة الطلبات -->
                        <li class="side-nav-item">
                            <a href="">
                                <span>{{ trans('main_trans.Order_Management') }}</span>
                            </a>
                        </li>
                        <!-- الإعدادات -->
                        <li class="side-nav-item">
                            <a href="">
                                <span>{{ trans('main_trans.Settings') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#employeesMenu" aria-expanded="false" aria-controls="employeesMenu" class="side-nav-link">
                    <i class="uil uil-user"></i> <!-- أيقونة الموظفين -->
                    <span>{{ trans('main_trans.Employees') }}</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="employeesMenu">
                    <ul class="side-nav-second-level">
                        <!-- إدارة الموظفين -->
                        <li class="side-nav-item">
                            <a href="">
                                <span>{{ trans('main_trans.Employee_Management') }}</span>
                            </a>
                        </li>
                        <!-- إدارة أدوار الموظفين -->
                        <li class="side-nav-item">
                            <a href="">
                                <span>{{ trans('main_trans.Employee_Roles_Management') }}</span>
                            </a>
                        </li>
                        <!-- إدارة الورديات -->
                        <li class="side-nav-item">
                            <a href="">
                                <span>{{ trans('main_trans.Shift_Management') }}</span>
                            </a>
                        </li>
                        <!-- الإعدادات -->
                        <li class="side-nav-item">
                            <a href="">
                                <span>{{ trans('main_trans.Settings') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

<li class="side-nav-item">
    <a data-bs-toggle="collapse" href="#organizationalStructureMenu" aria-expanded="false" aria-controls="organizationalStructureMenu" class="side-nav-link">
        <i class="uil uil-sitemap"></i> <!-- أيقونة الهيكل التنظيمي -->
        <span>{{ trans('main_trans.Organizational_Structure') }}</span>
        <span class="menu-arrow"></span>
    </a>
    <div class="collapse" id="organizationalStructureMenu">
        <ul class="side-nav-second-level">
            <!-- إدارة المسميات الوظيفية -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Job_Titles_Management') }}</span>
                </a>
            </li>
            <!-- إدارة الأقسام -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Departments_Management') }}</span>
                </a>
            </li>
            <!-- إدارة المستويات الوظيفية -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Job_Levels_Management') }}</span>
                </a>
            </li>
            <!-- إدارة أنواع الوظائف -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Job_Types_Management') }}</span>
                </a>
            </li>
        </ul>
    </div>
</li>
<li class="side-nav-item">
    <a data-bs-toggle="collapse" href="#attendanceMenu" aria-expanded="false" aria-controls="attendanceMenu" class="side-nav-link">
        <i class="uil uil-calendar-alt"></i> <!-- أيقونة الحضور -->
        <span>{{ trans('main_trans.Attendance') }}</span>
        <span class="menu-arrow"></span>
    </a>
    <div class="collapse" id="attendanceMenu">
        <ul class="side-nav-second-level">
            <!-- سجلات الحضور -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Attendance_Records') }}</span>
                </a>
            </li>
            <!-- أيام الحضور -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Attendance_Days') }}</span>
                </a>
            </li>
            <!-- دفاتر الحضور -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Attendance_Books') }}</span>
                </a>
            </li>
            <!-- أذونات إجازة -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Leave_Permissions') }}</span>
                </a>
            </li>
            <!-- طلبات الإجازة -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Leave_Requests') }}</span>
                </a>
            </li>
            <!-- إدارة الورديات -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Shift_Management') }}</span>
                </a>
            </li>
            <!-- ورديات مخصصة -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Custom_Shifts') }}</span>
                </a>
            </li>
            <!-- سجل جلسات الحضور -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Attendance_Sessions_Log') }}</span>
                </a>
            </li>
            <!-- الإعدادات -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Settings') }}</span>
                </a>
            </li>
        </ul>
    </div>
</li>

<li class="side-nav-item">
    <a data-bs-toggle="collapse" href="#salariesMenu" aria-expanded="false" aria-controls="salariesMenu" class="side-nav-link">
        <i class="uil uil-money-withdraw"></i> <!-- أيقونة المرتبات -->
        <span>{{ trans('main_trans.Salaries') }}</span>
        <span class="menu-arrow"></span>
    </a>
    <div class="collapse" id="salariesMenu">
        <ul class="side-nav-second-level">
            <!-- العقود -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Contracts') }}</span>
                </a>
            </li>
            <!-- مسير الرواتب -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Payroll') }}</span>
                </a>
            </li>
            <!-- قسائم الرواتب -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Salary_Slips') }}</span>
                </a>
            </li>
            <!-- السلف -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Advances') }}</span>
                </a>
            </li>
            <!-- بنود الراتب -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Salary_Items') }}</span>
                </a>
            </li>
            <!-- قوالب الراتب -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Salary_Templates') }}</span>
                </a>
            </li>
            <!-- الإعدادات -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Settings') }}</span>
                </a>
            </li>
        </ul>
    </div>
</li>

<li class="side-nav-item">
    <a data-bs-toggle="collapse" href="#reportsMenu" aria-expanded="false" aria-controls="reportsMenu" class="side-nav-link">
        <i class="uil uil-chart"></i> <!-- أيقونة التقارير -->
        <span>{{ trans('main_trans.Reports') }}</span>
        <span class="menu-arrow"></span>
    </a>
    <div class="collapse" id="reportsMenu">
        <ul class="side-nav-second-level">
            <!-- تقرير المبيعات -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Sales_Report') }}</span>
                </a>
            </li>
            <!-- تقرير المشتريات -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Purchases_Report') }}</span>
                </a>
            </li>
            <!-- تقرير الحسابات العامة -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.General_Accounts_Report') }}</span>
                </a>
            </li>
            <!-- تقرير الشيكات -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Cheques_Report') }}</span>
                </a>
            </li>
            <!-- تقرير الـ SMS -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.SMS_Report') }}</span>
                </a>
            </li>
            <!-- تقرير النقاط والأرصدة -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Points_and_Balances_Report') }}</span>
                </a>
            </li>
            <!-- تقرير الموظفين -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Employees_Report') }}</span>
                </a>
            </li>
            <!-- تقرير الحضور -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Attendance_Report') }}</span>
                </a>
            </li>
            <!-- تقرير الإنجازات -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Achievements_Report') }}</span>
                </a>
            </li>
            <!-- تقرير دورة العمل -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Work_Cycle_Report') }}</span>
                </a>
            </li>
            <!-- تقرير أوامر التوريد -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Supply_Orders_Report') }}</span>
                </a>
            </li>
            <!-- تقرير العملاء -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Customers_Report') }}</span>
                </a>
            </li>
            <!-- تقرير الموردين -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Suppliers_Report') }}</span>
                </a>
            </li>
            <!-- تقرير تتبع الوحدات -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Units_Tracking_Report') }}</span>
                </a>
            </li>
            <!-- سجل النشاطات للحساب -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Account_Activity_Log') }}</span>
                </a>
            </li>
        </ul>
    </div>
</li>
<li class="side-nav-item">
    <a data-bs-toggle="collapse" href="#branchesMenu" aria-expanded="false" aria-controls="branchesMenu" class="side-nav-link">
        <i class="uil uil-map-marker"></i> <!-- أيقونة الفروع -->
        <span>{{ trans('main_trans.Branches') }}</span>
        <span class="menu-arrow"></span>
    </a>
    <div class="collapse" id="branchesMenu">
        <ul class="side-nav-second-level">
            <!-- إدارة الفروع -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Branch_Management') }}</span>
                </a>
            </li>
            <!-- أضف فرع -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Add_Branch') }}</span>
                </a>
            </li>
            <!-- إعدادات الفروع -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Branch_Settings') }}</span>
                </a>
            </li>
        </ul>
    </div>
</li>
<li class="side-nav-item">
    <a data-bs-toggle="collapse" href="#templatesMenu" aria-expanded="false" aria-controls="templatesMenu" class="side-nav-link">
        <i class="uil uil-file-alt"></i> <!-- أيقونة القوالب -->
        <span>{{ trans('main_trans.Templates') }}</span>
        <span class="menu-arrow"></span>
    </a>
    <div class="collapse" id="templatesMenu">
        <ul class="side-nav-second-level">
            <!-- قوالب للطباعة -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Print_Templates') }}</span>
                </a>
            </li>
            <!-- قوالب الفواتير الجاهزة -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Ready_Invoice_Templates') }}</span>
                </a>
            </li>
            <!-- قوالب البريد الإلكتروني -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Email_Templates') }}</span>
                </a>
            </li>
            <!-- قوالب الـ SMS -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.SMS_Templates') }}</span>
                </a>
            </li>
            <!-- الشروط والأحكام -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Terms_and_Conditions') }}</span>
                </a>
            </li>
            <!-- إدارة الملفات والمستندات -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Document_Management') }}</span>
                </a>
            </li>
            <!-- قواعد الإرسال الآلي -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Automatic_Sending_Rules') }}</span>
                </a>
            </li>
        </ul>
    </div>
</li>
<li class="side-nav-item">
    <a data-bs-toggle="collapse" href="#settingsMenu" aria-expanded="false" aria-controls="settingsMenu" class="side-nav-link">
        <i class="uil uil-cog"></i> <!-- أيقونة الإعدادات -->
        <span>{{ trans('main_trans.Settings') }}</span>
        <span class="menu-arrow"></span>
    </a>
    <div class="collapse" id="settingsMenu">
        <ul class="side-nav-second-level">
            <!-- معلومات الحساب -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Account_Information') }}</span>
                </a>
            </li>
            <!-- إعدادات الحساب -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Account_Settings') }}</span>
                </a>
            </li>
            <!-- إعدادات الـ SMTP -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.SMTP_Settings') }}</span>
                </a>
            </li>
            <!-- طرق الدفع -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Payment_Methods') }}</span>
                </a>
            </li>
            <!-- إعدادات الـ SMS -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.SMS_Settings') }}</span>
                </a>
            </li>
            <!-- إعدادات الترقيم المتسلسل -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Sequential_Numbering_Settings') }}</span>
                </a>
            </li>
            <!-- إعدادات الضرائب -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Tax_Settings') }}</span>
                </a>
            </li>
            <!-- إدارة التطبيقات -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.Applications_Management') }}</span>
                </a>
            </li>
            <!-- شعار وألوان النظام -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.System_Logo_and_Colors') }}</span>
                </a>
            </li>
            <!-- API -->
            <li class="side-nav-item">
                <a href="">
                    <span>{{ trans('main_trans.API') }}</span>
                </a>
            </li>
        </ul>
    </div>
</li>



















        </li>
    </ul>
</div>
<!-- قائمة تتبع الوقت -->







<!-- التأكد من أن هذا الـ ID ليس متكررًا في أي مكان آخر -->


    <!-- Help Box -->
    <div class="help-box text-white text-center">
        <a href="javascript: void(0);" class="float-end close-btn text-white">
            <i class="mdi mdi-close"></i>
        </a>
        <img src="assets/images/help-icon.svg" height="90" alt="Helper Icon Image" />
        <h5 class="mt-3">Unlimited Access</h5>
        <p class="mb-3">Upgrade to plan to get access to unlimited reports</p>
        <a href="javascript: void(0);" class="btn btn-secondary btn-sm">Upgrade</a>
    </div>
    <!-- end Help Box -->
    <!-- End Sidebar -->

    <div class="clearfix"></div>

</div>
