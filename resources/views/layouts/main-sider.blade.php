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
                        <a href="extended-range-slider.html">Range Slider</a>
                    </li>
                    <li>
                        <a href="extended-ratings.html">Ratings</a>
                    </li>
                    <li>
                        <a href="extended-scrollbar.html">Scrollbar</a>
                    </li>
                    <li>
                        <a href="extended-scrollspy.html">Scrollspy</a>
                    </li>
                    <li>
                        <a href="extended-treeview.html">Treeview</a>
                    </li>
                </ul>
            </div>
        </li>

      

        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarIcons" aria-expanded="false" aria-controls="sidebarIcons"
                class="side-nav-link">
                <i class="uil-streering"></i>
                <span> Icons </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarIcons">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="icons-dripicons.html">Dripicons</a>
                    </li>
                    <li>
                        <a href="icons-mdi.html">Material Design</a>
                    </li>
                    <li>
                        <a href="icons-unicons.html">Unicons</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarForms" aria-expanded="false" aria-controls="sidebarForms"
                class="side-nav-link">
                <i class="uil-document-layout-center"></i>
                <span> Forms </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarForms">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="form-elements.html">Basic Elements</a>
                    </li>
                    <li>
                        <a href="form-advanced.html">Form Advanced</a>
                    </li>
                    <li>
                        <a href="form-validation.html">Validation</a>
                    </li>
                    <li>
                        <a href="form-wizard.html">Wizard</a>
                    </li>
                    <li>
                        <a href="form-fileuploads.html">File Uploads</a>
                    </li>
                    <li>
                        <a href="form-editors.html">Editors</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarCharts" aria-expanded="false" aria-controls="sidebarCharts"
                class="side-nav-link">
                <i class="uil-chart"></i>
                <span> Charts </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarCharts">
                <ul class="side-nav-second-level">
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarApexCharts" aria-expanded="false"
                            aria-controls="sidebarApexCharts">
                            <span> Apex Charts </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarApexCharts">
                            <ul class="side-nav-third-level">
                                <li>
                                    <a href="charts-apex-area.html">Area</a>
                                </li>
                                <li>
                                    <a href="charts-apex-bar.html">Bar</a>
                                </li>
                                <li>
                                    <a href="charts-apex-bubble.html">Bubble</a>
                                </li>
                                <li>
                                    <a href="charts-apex-candlestick.html">Candlestick</a>
                                </li>
                                <li>
                                    <a href="charts-apex-column.html">Column</a>
                                </li>
                                <li>
                                    <a href="charts-apex-heatmap.html">Heatmap</a>
                                </li>
                                <li>
                                    <a href="charts-apex-line.html">Line</a>
                                </li>
                                <li>
                                    <a href="charts-apex-mixed.html">Mixed</a>
                                </li>
                                <li>
                                    <a href="charts-apex-pie.html">Pie</a>
                                </li>
                                <li>
                                    <a href="charts-apex-radar.html">Radar</a>
                                </li>
                                <li>
                                    <a href="charts-apex-radialbar.html">RadialBar</a>
                                </li>
                                <li>
                                    <a href="charts-apex-scatter.html">Scatter</a>
                                </li>
                                <li>
                                    <a href="charts-apex-sparklines.html">Sparklines</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="charts-brite.html">Britecharts</a>
                    </li>
                    <li>
                        <a href="charts-chartjs.html">Chartjs</a>
                    </li>
                    <li>
                        <a href="charts-sparkline.html">Sparklines</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarTables" aria-expanded="false" aria-controls="sidebarTables"
                class="side-nav-link">
                <i class="uil-table"></i>
                <span> Tables </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarTables">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="tables-basic.html">Basic Tables</a>
                    </li>
                    <li>
                        <a href="tables-datatable.html">Data Tables</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarMaps" aria-expanded="false" aria-controls="sidebarMaps"
                class="side-nav-link">
                <i class="uil-location-point"></i>
                <span> Maps </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarMaps">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="maps-google.html">Google Maps</a>
                    </li>
                    <li>
                        <a href="maps-vector.html">Vector Maps</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarMultiLevel" aria-expanded="false"
                aria-controls="sidebarMultiLevel" class="side-nav-link">
                <i class="uil-folder-plus"></i>
                <span> Multi Level </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarMultiLevel">
                <ul class="side-nav-second-level">
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarSecondLevel" aria-expanded="false"
                            aria-controls="sidebarSecondLevel">
                            <span> Second Level </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarSecondLevel">
                            <ul class="side-nav-third-level">
                                <li>
                                    <a href="javascript: void(0);">Item 1</a>
                                </li>
                                <li>
                                    <a href="javascript: void(0);">Item 2</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarThirdLevel" aria-expanded="false"
                            aria-controls="sidebarThirdLevel">
                            <span> Third Level </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarThirdLevel">
                            <ul class="side-nav-third-level">
                                <li>
                                    <a href="javascript: void(0);">Item 1</a>
                                </li>
                                <li class="side-nav-item">
                                    <a data-bs-toggle="collapse" href="#sidebarFourthLevel" aria-expanded="false"
                                        aria-controls="sidebarFourthLevel">
                                        <span> Item 2 </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <div class="collapse" id="sidebarFourthLevel">
                                        <ul class="side-nav-forth-level">
                                            <li>
                                                <a href="javascript: void(0);">Item 2.1</a>
                                            </li>
                                            <li>
                                                <a href="javascript: void(0);">Item 2.2</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
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
