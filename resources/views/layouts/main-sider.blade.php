<div class="h-100" id="leftside-menu-container" data-simplebar>

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
    </ul>
</div>

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
