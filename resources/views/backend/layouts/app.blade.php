<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>@yield('title','Dashboard Blogging')</title>

    <!-- Favicon -->
{{--    <link rel="shortcut icon" href="{{asset('backend/assets/img/logos/taawin-logo-light-short.png')}}">--}}

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/bootstrap-icons/font/bootstrap-icons.css')}}">

    <link rel="stylesheet" href="{{asset('backend/assets/vendor/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/tom-select/dist/css/tom-select.bootstrap5.css')}}">

    <!-- INITIALIZATION OF QUILL-STYLE EDITOR -->
    <link rel="stylesheet" href="{{asset('backend/assets/vendor/quill/dist/quill.snow.css')}}">
    <style>
        .editor-quill {
            height: 200px;
            overflow-y: auto;
            /*font-size: 1rem;*/
        }

        .navbar-vertical-fixed {
            position: fixed;
            top: 0;
            right: 0;
        }

        .navbar-vertical-fixed .navbar-vertical-footer-offset {
            padding-bottom: 0 !important;
        }

    </style>

    <!-- CSS Front Template -->

    <link rel="preload" href="{{asset('backend/assets/css/theme.min.css')}}" data-hs-appearance="default" as="style">
    <link rel="preload" href="{{asset('backend/assets/css/theme-dark.min.css')}}" data-hs-appearance="dark" as="style">

    <style data-hs-appearance-onload-styles>
        *
        {
            transition: unset !important;
        }

        body
        {
            opacity: 0;
        }

    </style>

    <script>
        window.hs_config = {"autopath":"@@autopath","deleteLine":"hs-builder:delete","deleteLine:build":"hs-builder:build-delete","deleteLine:dist":"hs-builder:dist-delete","previewMode":false,"startPath":"/index.html","vars":{"themeFont":"https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap","version":"?v=1.0"},"layoutBuilder":{"extend":{"switcherSupport":true},"header":{"layoutMode":"default","containerMode":"container-fluid"},"sidebarLayout":"default"},"themeAppearance":{"layoutSkin":"default","sidebarSkin":"default","styles":{"colors":{"primary":"#377dff","transparent":"transparent","white":"#fff","dark":"132144","gray":{"100":"#f9fafc","900":"#1e2022"}},"font":"Inter"}},"languageDirection":{"lang":"en"},"skipFilesFromBundle":{"dist":["assets/js/hs.theme-appearance.js","assets/js/hs.theme-appearance-charts.js","assets/js/demo.js"],"build":["assets/css/theme.css","assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js","assets/js/demo.js","assets/css/theme-dark.css","assets/css/docs.css","assets/vendor/icon-set/style.css","assets/js/hs.theme-appearance.js","assets/js/hs.theme-appearance-charts.js","node_modules/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js","assets/js/demo.js"]},"minifyCSSFiles":["assets/css/theme.css","assets/css/theme-dark.css"],"copyDependencies":{"dist":{"*assets/js/theme-custom.js":""},"build":{"*assets/js/theme-custom.js":"","node_modules/bootstrap-icons/font/*fonts/**":"assets/css"}},"buildFolder":"","replacePathsToCDN":{},"directoryNames":{"src":"./src","dist":"./dist","build":"./build"},"fileNames":{"dist":{"js":"theme.min.js","css":"theme.min.css"},"build":{"css":"theme.min.css","js":"theme.min.js","vendorCSS":"vendor.min.css","vendorJS":"vendor.min.js"}},"fileTypes":"jpg|png|svg|mp4|webm|ogv|json"}
        window.hs_config.gulpRGBA = (p1) => {
            const options = p1.split(',')
            const hex = options[0].toString()
            const transparent = options[1].toString()

            var c;
            if(/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)){
                c= hex.substring(1).split('');
                if(c.length== 3){
                    c= [c[0], c[0], c[1], c[1], c[2], c[2]];
                }
                c= '0x'+c.join('');
                return 'rgba('+[(c>>16)&255, (c>>8)&255, c&255].join(',')+',' + transparent + ')';
            }
            throw new Error('Bad Hex');
        }
        window.hs_config.gulpDarken = (p1) => {
            const options = p1.split(',')

            let col = options[0].toString()
            let amt = -parseInt(options[1])
            var usePound = false

            if (col[0] == "#") {
                col = col.slice(1)
                usePound = true
            }
            var num = parseInt(col, 16)
            var r = (num >> 16) + amt
            if (r > 255) {
                r = 255
            } else if (r < 0) {
                r = 0
            }
            var b = ((num >> 8) & 0x00FF) + amt
            if (b > 255) {
                b = 255
            } else if (b < 0) {
                b = 0
            }
            var g = (num & 0x0000FF) + amt
            if (g > 255) {
                g = 255
            } else if (g < 0) {
                g = 0
            }
            return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
        }
        window.hs_config.gulpLighten = (p1) => {
            const options = p1.split(',')

            let col = options[0].toString()
            let amt = parseInt(options[1])
            var usePound = false

            if (col[0] == "#") {
                col = col.slice(1)
                usePound = true
            }
            var num = parseInt(col, 16)
            var r = (num >> 16) + amt
            if (r > 255) {
                r = 255
            } else if (r < 0) {
                r = 0
            }
            var b = ((num >> 8) & 0x00FF) + amt
            if (b > 255) {
                b = 255
            } else if (b < 0) {
                b = 0
            }
            var g = (num & 0x0000FF) + amt
            if (g > 255) {
                g = 255
            } else if (g < 0) {
                g = 0
            }
            return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
        }
    </script>

    <link rel="stylesheet" href="{{asset('backend/assets/css/site.css')}}">


    @stack('style')

</head>

<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl   footer-offset">

<script src="{{asset('backend/assets/js/hs.theme-appearance.js')}}"></script>

<script src="{{asset('backend/assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js')}}"></script>


<!-- ========== HEADER ========== -->
@include('backend.includes.header')
<!-- ========== END HEADER ========== -->


<!-- ========== MAIN CONTENT ========== -->

<!-- Navbar Vertical -->
    @include('backend.includes.aside')
<!-- End Navbar Vertical -->

<main id="content" role="main" class="main">



    @yield('content')

    @include('backend.includes.footer')


</main>
<!-- ========== END MAIN CONTENT ========== -->

<!-- JS Global Compulsory  -->
<script src="{{asset('backend/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('backend/assets/vendor/jquery-migrate/dist/jquery-migrate.min.js')}}"></script>
<script src="{{asset('backend/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

<!-- JS Implementing Plugins -->
<script src="{{asset('backend/assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside.min.js')}}"></script>
<script src="{{asset('backend/assets/vendor/hs-form-search/dist/hs-form-search.min.js')}}"></script>

<script src="{{asset('backend/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
<script src="{{asset('backend/assets/vendor/chartjs-chart-matrix/dist/chartjs-chart-matrix.min.js')}}"></script>
<script src="{{asset('backend/assets/vendor/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js')}}"></script>
<script src="{{asset('backend/assets/vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('backend/assets/vendor/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('backend/assets/vendor/tom-select/dist/js/tom-select.complete.min.js')}}"></script>
<script src="{{asset('backend/assets/vendor/clipboard/dist/clipboard.min.js')}}"></script>
<script src="{{asset('backend/assets/vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/assets/vendor/datatables.net.extensions/select/select.min.js')}}"></script>

<!-- INITIALIZATION OF QUILLJS EDITOR -->
<script src="{{asset('backend/assets/vendor/quill/dist/quill.min.js')}}"></script>
{{-- Initialize QUill editor add fonts and color --}}
<script src="{{ asset('backend/assets/js/jsQuill/toolbar_quill.js') }} "></script>


<!-- JS Front -->
<script src="{{asset('backend/assets/js/theme.min.js')}}"></script>
<script src="{{asset('backend/assets/js/hs.theme-appearance-charts.js')}}"></script>

<!-- JS Plugins Init. -->
<script>
    $(document).on('ready', function () {
        // INITIALIZATION OF DATERANGEPICKER
        // =======================================================
        $('.js-daterangepicker').daterangepicker();

        $('.js-daterangepicker-times').daterangepicker({
            timePicker: true,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(32, 'hour'),
            locale: {
                format: 'M/DD hh:mm A'
            }
        });

        var start = moment();
        var end = moment();

        function cb(start, end) {
            $('#js-daterangepicker-predefined .js-daterangepicker-predefined-preview').html(start.format('MMM D') + ' - ' + end.format('MMM D, YYYY'));
        }

        $('#js-daterangepicker-predefined').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);
    });


    // INITIALIZATION OF DATATABLES
    // =======================================================
    HSCore.components.HSDatatables.init($('#datatable'), {
        select: {
            style: 'multi',
            selector: 'td:first-child input[type="checkbox"]',
            classMap: {
                checkAll: '#datatableCheckAll',
                counter: '#datatableCounter',
                counterInfo: '#datatableCounterInfo'
            }
        },
        language: {
            zeroRecords: `<div class="text-center p-4">
              <img class="mb-3" src="{{asset('backend/assets/svg/illustrations/oc-error.svg')}}" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="default">
              <img class="mb-3" src="{{asset('backend/assets/svg/illustrations-light/oc-error.svg')}}" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="dark">
            <p class="mb-0">No data to show</p>
            </div>`
        }
    });

    const datatable = HSCore.components.HSDatatables.getItem(0)

    document.querySelectorAll('.js-datatable-filter').forEach(function (item) {
        item.addEventListener('change',function(e) {
            const elVal = e.target.value,
                targetColumnIndex = e.target.getAttribute('data-target-column-index'),
                targetTable = e.target.getAttribute('data-target-table');

            HSCore.components.HSDatatables.getItem(targetTable).column(targetColumnIndex).search(elVal !== 'null' ? elVal : '').draw()
        })
    })
</script>

<!-- JS Plugins Init. -->
<script>
    (function() {
        localStorage.removeItem('hs_theme')

        window.onload = function () {


            // INITIALIZATION OF NAVBAR VERTICAL ASIDE
            // =======================================================
            new HSSideNav('.js-navbar-vertical-aside').init()


            // INITIALIZATION OF FORM SEARCH
            // =======================================================
            const HSFormSearchInstance = new HSFormSearch('.js-form-search')

            if (HSFormSearchInstance.collection.length) {
                HSFormSearchInstance.getItem(1).on('close', function (el) {
                    el.classList.remove('top-0')
                })

                document.querySelector('.js-form-search-mobile-toggle').addEventListener('click', e => {
                    let dataOptions = JSON.parse(e.currentTarget.getAttribute('data-hs-form-search-options')),
                        $menu = document.querySelector(dataOptions.dropMenuElement)

                    $menu.classList.add('top-0')
                    $menu.style.left = 0
                })
            }


            // INITIALIZATION OF BOOTSTRAP DROPDOWN
            // =======================================================
            HSBsDropdown.init()


            // INITIALIZATION OF CHARTJS
            // =======================================================
            HSCore.components.HSChartJS.init('.js-chart')


            // INITIALIZATION OF CHARTJS
            // =======================================================
            HSCore.components.HSChartJS.init('#updatingBarChart')
            const updatingBarChart = HSCore.components.HSChartJS.getItem('updatingBarChart')

            // Call when tab is clicked
            document.querySelectorAll('[data-bs-toggle="chart-bar"]').forEach(item => {
                item.addEventListener('click', e => {
                    let keyDataset = e.currentTarget.getAttribute('data-datasets')

                    const styles = HSCore.components.HSChartJS.getTheme('updatingBarChart', HSThemeAppearance.getAppearance())

                    if (keyDataset === 'lastWeek') {
                        updatingBarChart.data.labels = ["Apr 22", "Apr 23", "Apr 24", "Apr 25", "Apr 26", "Apr 27", "Apr 28", "Apr 29", "Apr 30", "Apr 31"];
                        updatingBarChart.data.datasets = [
                            {
                                "data": [120, 250, 300, 200, 300, 290, 350, 100, 125, 320],
                                "backgroundColor": styles.data.datasets[0].backgroundColor,
                                "hoverBackgroundColor": styles.data.datasets[0].hoverBackgroundColor,
                                "borderColor": styles.data.datasets[0].borderColor,
                                "maxBarThickness": 10
                            },
                            {
                                "data": [250, 130, 322, 144, 129, 300, 260, 120, 260, 245, 110],
                                "backgroundColor": styles.data.datasets[1].backgroundColor,
                                "borderColor": styles.data.datasets[1].borderColor,
                                "maxBarThickness": 10
                            }
                        ];
                        updatingBarChart.update();
                    } else {
                        updatingBarChart.data.labels = ["May 1", "May 2", "May 3", "May 4", "May 5", "May 6", "May 7", "May 8", "May 9", "May 10"];
                        updatingBarChart.data.datasets = [
                            {
                                "data": [200, 300, 290, 350, 150, 350, 300, 100, 125, 220],
                                "backgroundColor": styles.data.datasets[0].backgroundColor,
                                "hoverBackgroundColor": styles.data.datasets[0].hoverBackgroundColor,
                                "borderColor": styles.data.datasets[0].borderColor,
                                "maxBarThickness": 10
                            },
                            {
                                "data": [150, 230, 382, 204, 169, 290, 300, 100, 300, 225, 120],
                                "backgroundColor": styles.data.datasets[1].backgroundColor,
                                "borderColor": styles.data.datasets[1].borderColor,
                                "maxBarThickness": 10
                            }
                        ]
                        updatingBarChart.update();
                    }
                })
            })


            // INITIALIZATION OF CHARTJS
            // =======================================================
            HSCore.components.HSChartJS.init('.js-chart-datalabels', {
                plugins: [ChartDataLabels],
                options: {
                    plugins: {
                        datalabels: {
                            anchor: function (context) {
                                var value = context.dataset.data[context.dataIndex];
                                return value.r < 20 ? 'end' : 'center';
                            },
                            align: function (context) {
                                var value = context.dataset.data[context.dataIndex];
                                return value.r < 20 ? 'end' : 'center';
                            },
                            color: function (context) {
                                var value = context.dataset.data[context.dataIndex];
                                return value.r < 20 ? context.dataset.backgroundColor : context.dataset.color;
                            },
                            font: function (context) {
                                var value = context.dataset.data[context.dataIndex],
                                    fontSize = 25;

                                if (value.r > 50) {
                                    fontSize = 35;
                                }

                                if (value.r > 70) {
                                    fontSize = 55;
                                }

                                return {
                                    weight: 'lighter',
                                    size: fontSize
                                };
                            },
                            formatter: function (value) {
                                return value.r
                            },
                            offset: 2,
                            padding: 0
                        }
                    },
                }
            })

            // INITIALIZATION OF SELECT
            // =======================================================
            HSCore.components.HSTomSelect.init('.js-select')


            // INITIALIZATION OF CLIPBOARD
            // =======================================================
            HSCore.components.HSClipboard.init('.js-clipboard')
        }
    })()
</script>

<!-- Style Switcher JS -->
<script>
    (function () {
        // STYLE SWITCHER
        // =======================================================
        const $dropdownBtn = document.getElementById('selectThemeDropdown') // Dropdowon trigger
        const $variants = document.querySelectorAll(`[aria-labelledby="selectThemeDropdown"] [data-icon]`) // All items of the dropdown

        // Function to set active style in the dorpdown menu and set icon for dropdown trigger
        const setActiveStyle = function () {
            $variants.forEach($item => {
                if ($item.getAttribute('data-value') === HSThemeAppearance.getOriginalAppearance()) {
                    $dropdownBtn.innerHTML = `<i class="${$item.getAttribute('data-icon')}" />`
                    return $item.classList.add('active')
                }

                $item.classList.remove('active')
            })
        }

        // Add a click event to all items of the dropdown to set the style
        $variants.forEach(function ($item) {
            $item.addEventListener('click', function () {
                HSThemeAppearance.setAppearance($item.getAttribute('data-value'))
            })
        })

        // Call the setActiveStyle on load page
        setActiveStyle()

        // Add event listener on change style to call the setActiveStyle function
        window.addEventListener('on-hs-appearance-change', function () {
            setActiveStyle()
        })
    })()
</script>
<!-- End Style Switcher JS -->


<!-- INITIALIZATION OF DATATABLES -->
<script src="{{asset('backend/assets/js/hs.datatables.js')}}"></script>
<script>
    (function () {
        // INITIALIZATION OF DATATABLES
        // =======================================================
        HSCore.components.HSDatatables.init('.js-datatable')
    })()
</script>
<!-- End INITIALIZATION OF DATATABLES -->

<!-- setTimeout alert -->
<script>
    $("document").ready(function(){
        setTimeout(function(){
            $(".alert-success").remove();
        }, 2000 ); // 2 secs
    });
</script>

<!-- setTimeout alert -->
<script>
    $("document").ready(function(){
        setTimeout(function(){
            $("#alert-success").remove();
        }, 2000 ); // 2 secs
    });
</script>
<!-- End setTimeout -->

@stack('js')
</body>
</html>
