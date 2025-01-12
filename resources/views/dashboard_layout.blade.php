<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('dashboardFiles/css/styles.css') }}">
</head>

<body>
    <div class="navbar">
        <div class="logo">Laravel Assignment for eng: Sohaib</div>
        <div class="nav-links">
            <a href="#">الرئيسية</a>
            <a href="#">الطلب</a>
            <a href="#">الطلاب</a>
            <a href="#">المكتبة</a>
            <a href="#">البيانات</a>
        </div>
        <div class="user">
            <button>اسم المستخدم</button>
        </div>
    </div>

    <div class="content">
        <div class="breadcrumbs">الرئيسية / المكتبة / البيانات</div>

        <div class="main-section">
            @yield('pageContent')
        </div>

        <div class="sidebar">
            <div class="menu-header">القائمة الرئيسية</div>
            <ul>
                <li><i class="icon">&#9998;</i>
                <a href="{{route('addCategoryUi')}}">
                    اضافة فئة
                </a>
                </li>
                <li><i class="icon">&#9993;</i>
                    <a href="{{route('viewCategories')}}">
                        عرض الفئات
                    </a>
                </li>
            </ul>
            <div class="language-selector">
                <span>العربية</span> |
                <span>English (US)</span>
            </div>
        </div>
    </div>

    <footer>STUDENT_ID: 120220562 | STUDENT NAME: KARAM RAMI FAHMI HELLES</footer>

    <script src="{{ asset('dashboardFiles/js/script.js') }}"></script>
</body>

</html>