@extends('admin.index')
@section('main_content')
    <!-- main-content -->
    <div class="main-content">
        <!-- main-content-wrap -->
        <div class="main-content-inner">
            <!-- main-content-wrap -->
            <div class="main-content-wrap">
                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                    <h3>Report</h3>
                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                        <li>
                            <a href="index.html"><div class="text-tiny">Dashboard</div></a>
                        </li>
                        <li>
                            <i class="icon-chevron-right"></i>
                        </li>
                        <li>
                            <div class="text-tiny">Report</div>
                        </li>
                    </ul>
                </div>
                <div class="tf-section-3 mb-30">
                    <!-- chart-default -->
                    <div class="wg-chart-default">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="52" viewBox="0 0 48 52" fill="none">
                                        <path opacity="0.08" d="M19.1086 2.12943C22.2027 0.343099 26.0146 0.343099 29.1086 2.12943L42.4913 9.85592C45.5853 11.6423 47.4913 14.9435 47.4913 18.5162V33.9692C47.4913 37.5418 45.5853 40.8431 42.4913 42.6294L29.1086 50.3559C26.0146 52.1423 22.2027 52.1423 19.1086 50.3559L5.72596 42.6294C2.63194 40.8431 0.725956 37.5418 0.725956 33.9692V18.5162C0.725956 14.9435 2.63195 11.6423 5.72596 9.85592L19.1086 2.12943Z" fill="url(#paint0_linear_53_110)"></path>
                                        <defs>
                                          <linearGradient id="paint0_linear_53_110" x1="-43.532" y1="-34.3465" x2="37.6769" y2="43.9447" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#92BCFF"></stop>
                                            <stop offset="1" stop-color="#2377FC"></stop>
                                          </linearGradient>
                                        </defs>
                                    </svg>
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Total Amount</div>
                                    <h4>34,945</h4>
                                </div>
                            </div>
                            <div class="box-icon-trending up">
                                <i class="icon-trending-up"></i>
                                <div class="body-title number">1.56%</div>
                            </div>
                        </div>
                        <div class="wrap-chart">
                            <div id="line-chart-11"></div>
                        </div>
                    </div>
                    <!-- /chart-default -->
                    <!-- chart-default -->
                    <div class="wg-chart-default">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="52" viewBox="0 0 48 52" fill="none">
                                        <path opacity="0.08" d="M19.1086 2.12943C22.2027 0.343099 26.0146 0.343099 29.1086 2.12943L42.4913 9.85592C45.5853 11.6423 47.4913 14.9435 47.4913 18.5162V33.9692C47.4913 37.5418 45.5853 40.8431 42.4913 42.6294L29.1086 50.3559C26.0146 52.1423 22.2027 52.1423 19.1086 50.3559L5.72596 42.6294C2.63194 40.8431 0.725956 37.5418 0.725956 33.9692V18.5162C0.725956 14.9435 2.63195 11.6423 5.72596 9.85592L19.1086 2.12943Z" fill="url(#paint0_linear_53_110)"></path>
                                        <defs>
                                          <linearGradient id="paint0_linear_53_110" x1="-43.532" y1="-34.3465" x2="37.6769" y2="43.9447" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#92BCFF"></stop>
                                            <stop offset="1" stop-color="#2377FC"></stop>
                                          </linearGradient>
                                        </defs>
                                    </svg>
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Total Revenue</div>
                                    <h4>$37,802</h4>
                                </div>
                            </div>
                            <div class="box-icon-trending down">
                                <i class="icon-trending-down"></i>
                                <div class="body-title number">1.56%</div>
                            </div>
                        </div>
                        <div class="wrap-chart">
                            <div id="line-chart-12"></div>
                        </div>
                    </div>
                    <!-- /chart-default -->
                    <!-- chart-default -->
                    <div class="wg-chart-default">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="52" viewBox="0 0 48 52" fill="none">
                                        <path opacity="0.08" d="M19.1086 2.12943C22.2027 0.343099 26.0146 0.343099 29.1086 2.12943L42.4913 9.85592C45.5853 11.6423 47.4913 14.9435 47.4913 18.5162V33.9692C47.4913 37.5418 45.5853 40.8431 42.4913 42.6294L29.1086 50.3559C26.0146 52.1423 22.2027 52.1423 19.1086 50.3559L5.72596 42.6294C2.63194 40.8431 0.725956 37.5418 0.725956 33.9692V18.5162C0.725956 14.9435 2.63195 11.6423 5.72596 9.85592L19.1086 2.12943Z" fill="url(#paint0_linear_53_110)"></path>
                                        <defs>
                                          <linearGradient id="paint0_linear_53_110" x1="-43.532" y1="-34.3465" x2="37.6769" y2="43.9447" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#92BCFF"></stop>
                                            <stop offset="1" stop-color="#2377FC"></stop>
                                          </linearGradient>
                                        </defs>
                                    </svg>
                                    <i class="icon-users"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Total Customer</div>
                                    <h4>34,945</h4>
                                </div>
                            </div>
                            <div class="box-icon-trending">
                                <i class="icon-trending-up"></i>
                                <div class="body-title number">0.00%</div>
                            </div>
                        </div>
                        <div class="wrap-chart">
                            <div id="line-chart-13"></div>
                        </div>
                    </div>
                    <!-- /chart-default -->
                </div>
                <div class="tf-section-2 mb-30">
                    <!-- seller-statistic -->
                    <div class="wg-box">
                        <div class="flex items-center justify-between">
                            <h5>Seller statistic</h5>
                            <div class="flex gap10">
                                <div class="select w160 ">
                                    <select class="h40">
                                        <option>Last 30 days</option>
                                        <option>Last 14 days</option>
                                        <option>Last 7 days</option>
                                    </select>
                                </div>
                                <a class="tf-button-download" href="#"><i class="icon-download-cloud"></i></a>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap40">
                            <div>
                                <div class="mb-2">
                                    <div class="block-legend">
                                        <div class="dot t1"></div>
                                        <div class="text-tiny">Revenue</div>
                                    </div>
                                </div>
                                <div class="flex items-center gap10">
                                    <h4>$37,802</h4>
                                    <div class="box-icon-trending up">
                                        <i class="icon-trending-up"></i>
                                        <div class="body-title number">0.56%</div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="mb-2">
                                    <div class="block-legend">
                                        <div class="dot t2"></div>
                                        <div class="text-tiny">Profit</div>
                                    </div>
                                </div>
                                <div class="flex items-center gap10">
                                    <h4>$28,305</h4>
                                    <div class="box-icon-trending up">
                                        <i class="icon-trending-up"></i>
                                        <div class="body-title number">0.56%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="line-chart-14"></div>
                    </div>
                    <!-- /seller-statistic -->
                    <!-- total-sale -->
                    <div class="wg-box">
                        <div class="flex items-center justify-between">
                            <h5>Total sale</h5>
                            <div class="flex gap10">
                                <div class="select w160 ">
                                    <select class="h40">
                                        <option>Last 30 days</option>
                                        <option>Last 14 days</option>
                                        <option>Last 7 days</option>
                                    </select>
                                </div>
                                <a class="tf-button-download" href="#"><i class="icon-download-cloud"></i></a>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap40">
                            <div>
                                <div class="mb-2">
                                    <div class="block-legend">
                                        <div class="dot t1"></div>
                                        <div class="text-tiny">Revenue</div>
                                    </div>
                                </div>
                                <div class="flex items-center gap10">
                                    <h4>$37,802</h4>
                                    <div class="box-icon-trending up">
                                        <i class="icon-trending-up"></i>
                                        <div class="body-title number">0.56%</div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="mb-2">
                                    <div class="block-legend">
                                        <div class="dot t2"></div>
                                        <div class="text-tiny">Profit</div>
                                    </div>
                                </div>
                                <div class="flex items-center gap10">
                                    <h4>$28,305</h4>
                                    <div class="box-icon-trending up">
                                        <i class="icon-trending-up"></i>
                                        <div class="body-title number">0.56%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="line-chart-8"></div>
                    </div>
                    <!-- /total-sale -->
                </div>
                <!-- sale-purchase -->
                <div class="wg-box mb-30">
                    <div class="">
                        <h5>Sale / Purchase return</h5>
                        <div class="flex gap10">
                            <h4>$84.86B</h4>
                            <div class="box-icon-trending down">
                                <i class="icon-trending-down"></i>
                                <div class="body-title number">1.02%</div>
                            </div>
                        </div>
                    </div>
                    <div id="line-chart-15"></div>
                    <div id="line-chart-16"></div>
                </div>
                <!-- /sale-purchase -->
                <!-- history -->
                <div class="wg-box">
                    <h5>Transfer History</h5>
                    <div class="wg-table table-all-attribute">
                        <ul class="table-title flex gap20 mb-14">
                            <li>
                                <div class="body-title">Transfer Id</div>
                            </li>
                            <li>
                                <div class="body-title">Name</div>
                            </li>
                            <li>
                                <div class="body-title">Date</div>
                            </li>
                            <li>
                                <div class="body-title">Total</div>
                            </li>
                            <li>
                                <div class="body-title">Action</div>
                            </li>
                        </ul>
                        <ul class="flex flex-column">
                            <li class="attribute-item flex items-center justify-between gap20">
                                <div class="body-text">11081197</div>
                                <div class="body-text">Kathryn Murphy</div>
                                <div class="body-text">Mar 20, 2023</div>
                                <div class="body-text">$2,700</div>
                                <div class="list-icon-function">
                                    <div class="item eye">
                                        <i class="icon-eye"></i>
                                    </div>
                                    <div class="item edit">
                                        <i class="icon-edit-3"></i>
                                    </div>
                                    <div class="item trash">
                                        <i class="icon-trash-2"></i>
                                    </div>
                                </div>
                            </li>
                            <li class="attribute-item flex items-center justify-between gap20">
                                <div class="body-text">38766940</div>
                                <div class="body-text">Floyd Miles</div>
                                <div class="body-text">Mar 20, 2023</div>
                                <div class="body-text">$2,700</div>
                                <div class="list-icon-function">
                                    <div class="item eye">
                                        <i class="icon-eye"></i>
                                    </div>
                                    <div class="item edit">
                                        <i class="icon-edit-3"></i>
                                    </div>
                                    <div class="item trash">
                                        <i class="icon-trash-2"></i>
                                    </div>
                                </div>
                            </li>
                            <li class="attribute-item flex items-center justify-between gap20">
                                <div class="body-text">43397744</div>
                                <div class="body-text">Brooklyn Simmons</div>
                                <div class="body-text">Mar 20, 2023</div>
                                <div class="body-text">$2,700</div>
                                <div class="list-icon-function">
                                    <div class="item eye">
                                        <i class="icon-eye"></i>
                                    </div>
                                    <div class="item edit">
                                        <i class="icon-edit-3"></i>
                                    </div>
                                    <div class="item trash">
                                        <i class="icon-trash-2"></i>
                                    </div>
                                </div>
                            </li>
                            <li class="attribute-item flex items-center justify-between gap20">
                                <div class="body-text">66277431</div>
                                <div class="body-text">Wade Warren</div>
                                <div class="body-text">Mar 20, 2023</div>
                                <div class="body-text">$2,700</div>
                                <div class="list-icon-function">
                                    <div class="item eye">
                                        <i class="icon-eye"></i>
                                    </div>
                                    <div class="item edit">
                                        <i class="icon-edit-3"></i>
                                    </div>
                                    <div class="item trash">
                                        <i class="icon-trash-2"></i>
                                    </div>
                                </div>
                            </li>
                            <li class="attribute-item flex items-center justify-between gap20">
                                <div class="body-text">58276066</div>
                                <div class="body-text">Devon Lane</div>
                                <div class="body-text">Mar 20, 2023</div>
                                <div class="body-text">$2,700</div>
                                <div class="list-icon-function">
                                    <div class="item eye">
                                        <i class="icon-eye"></i>
                                    </div>
                                    <div class="item edit">
                                        <i class="icon-edit-3"></i>
                                    </div>
                                    <div class="item trash">
                                        <i class="icon-trash-2"></i>
                                    </div>
                                </div>
                            </li>
                            <li class="attribute-item flex items-center justify-between gap20">
                                <div class="body-text">93242854</div>
                                <div class="body-text">Jenny Wilson</div>
                                <div class="body-text">Mar 20, 2023</div>
                                <div class="body-text">$2,700</div>
                                <div class="list-icon-function">
                                    <div class="item eye">
                                        <i class="icon-eye"></i>
                                    </div>
                                    <div class="item edit">
                                        <i class="icon-edit-3"></i>
                                    </div>
                                    <div class="item trash">
                                        <i class="icon-trash-2"></i>
                                    </div>
                                </div>
                            </li>
                            <li class="attribute-item flex items-center justify-between gap20">
                                <div class="body-text">11081197</div>
                                <div class="body-text">Jane Cooper</div>
                                <div class="body-text">Mar 20, 2023</div>
                                <div class="body-text">$2,700</div>
                                <div class="list-icon-function">
                                    <div class="item eye">
                                        <i class="icon-eye"></i>
                                    </div>
                                    <div class="item edit">
                                        <i class="icon-edit-3"></i>
                                    </div>
                                    <div class="item trash">
                                        <i class="icon-trash-2"></i>
                                    </div>
                                </div>
                            </li>
                            <li class="attribute-item flex items-center justify-between gap20">
                                <div class="body-text">55700223</div>
                                <div class="body-text">Albert Flores</div>
                                <div class="body-text">Mar 20, 2023</div>
                                <div class="body-text">$2,700</div>
                                <div class="list-icon-function">
                                    <div class="item eye">
                                        <i class="icon-eye"></i>
                                    </div>
                                    <div class="item edit">
                                        <i class="icon-edit-3"></i>
                                    </div>
                                    <div class="item trash">
                                        <i class="icon-trash-2"></i>
                                    </div>
                                </div>
                            </li>
                            <li class="attribute-item flex items-center justify-between gap20">
                                <div class="body-text">34034474</div>
                                <div class="body-text">Robert Fox</div>
                                <div class="body-text">Mar 20, 2023</div>
                                <div class="body-text">$2,700</div>
                                <div class="list-icon-function">
                                    <div class="item eye">
                                        <i class="icon-eye"></i>
                                    </div>
                                    <div class="item edit">
                                        <i class="icon-edit-3"></i>
                                    </div>
                                    <div class="item trash">
                                        <i class="icon-trash-2"></i>
                                    </div>
                                </div>
                            </li>
                            <li class="attribute-item flex items-center justify-between gap20">
                                <div class="body-text">34034474</div>
                                <div class="body-text">Theresa Webb</div>
                                <div class="body-text">Mar 20, 2023</div>
                                <div class="body-text">$2,700</div>
                                <div class="list-icon-function">
                                    <div class="item eye">
                                        <i class="icon-eye"></i>
                                    </div>
                                    <div class="item edit">
                                        <i class="icon-edit-3"></i>
                                    </div>
                                    <div class="item trash">
                                        <i class="icon-trash-2"></i>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="divider"></div>
                    <div class="flex items-center justify-between flex-wrap gap10">
                        <div class="text-tiny">Showing 10 to 16 in 30 records</div>
                        <ul class="wg-pagination">
                            <li>
                                <a href="#"><i class="icon-chevron-left"></i></a>
                            </li>
                            <li>
                                <a href="#">1</a>
                            </li>
                            <li class="active">
                                <a href="#">2</a>
                            </li>
                            <li>
                                <a href="#">3</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon-chevron-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /history -->
            </div>
            <!-- /main-content-wrap -->
        </div>
        <!-- /main-content-wrap -->
        <!-- bottom-page -->
        <div class="bottom-page">
            <div class="body-text">Copyright © 2024 Remos. Design with</div>
            <i class="icon-heart"></i>
            <div class="body-text">by <a href="https://themeforest.net/user/themesflat/portfolio">Themesflat</a> All rights reserved.</div>
        </div>
        <!-- /bottom-page -->
    </div>
    <!-- /main-content -->
@endsection
