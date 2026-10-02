/**
 * Global Urdu Translation — Full DOM text replacement
 * Language source of truth: Laravel session (via page data attribute)
 * localStorage is only used for dark theme.
 */

var UR = {
    // Navigation
    'Dashboard': 'ڈیش بورڈ',
    'Hospitals': 'ہسپتال',
    'Patients': 'مریض',
    'Vaccines': 'ویکسین',
    'Reports': 'رپورٹس',
    'Bookings': 'بکنگز',
    'Test Reports': 'ٹیسٹ رپورٹس',
    'Home': 'ہوم',
    'Logout': 'لاگ آؤٹ',
    'Contact': 'رابطہ',
    'Search Hospitals': 'ہسپتال تلاش کریں',
    'My Appointments': 'میری اپوائنٹمنٹس',
    'Track Vaccination': 'ویکسینیشن ٹریک کریں',
    'Edit Profile': 'پروفائل تبدیل کریں',
    'Manage Vaccines': 'ویکسین منظم کریں',
    'Patient List': 'مریضوں کی فہرست',
    'Appointments': 'اپوائنٹمنٹس',
    'Admin Panel': 'ایڈمن پینل',
    'Hospital Panel': 'ہسپتال پینل',
    'Patient Panel': 'مریض پینل',
    'Covid Vaccination Portal': 'کووڈ ویکسینیشن پورٹل',
    'Covid Vaccination Portal — Admin': 'کووڈ ویکسینیشن پورٹل — ایڈمن',
    'Covid Vaccination Portal — Hospital': 'کووڈ ویکسینیشن پورٹل — ہسپتال',
    'Covid Vaccination Portal — Patient': 'کووڈ ویکسینیشن پورٹل — مریض',
    'Settings': 'ترتیبات',
    'Dark Theme': 'ڈارک تھیم',
    'Language': 'زبان',

    // Dashboard headings
    'My Profile': 'میری پروفائل',
    'Admin Dashboard': 'ایڈمن ڈیش بورڈ',
    'Hospital Dashboard': 'ہسپتال ڈیش بورڈ',
    'Total Patients': 'کل مریض',
    'Approved Hospitals': 'منظور شدہ ہسپتال',
    'Pending Hospitals': 'زیر التواء ہسپتال',
    'Total Bookings': 'کل بکنگز',
    'Total Appointments': 'کل اپوائنٹمنٹس',
    'Pending': 'زیر التواء',
    'Approved': 'منظور شدہ',
    'Completed': 'مکمل',
    'Rejected': 'مسترد',
    'View Hospitals': 'ہسپتال دیکھیں',
    'View Patients': 'مریض دیکھیں',
    'Approve / Reject': 'منظور / مسترد',
    'Patient profiles & appointments': 'مریض پروفائل اور اپوائنٹمنٹس',
    'Stock & availability': 'اسٹاک اور دستیابی',
    'Approved patients': 'منظور شدہ مریض',

    // Profile
    'Phone': 'فون',
    'Date of Birth': 'تاریخ پیدائش',
    'Gender': 'جنس',
    'City': 'شہر',
    'Address': 'پتہ',
    'Not set': 'سیٹ نہیں',
    'Patient': 'مریض',
    'Contact Person': 'رابطہ شخص',
    'License No': 'لائسنس نمبر',
    'Full Name': 'پورا نام',
    'Save Changes': 'تبدیلیاں محفوظ کریں',
    'Cancel': 'منسوخ',
    'Delete Account': 'اکاؤنٹ حذف کریں',
    'Delete My Account': 'میرا اکاؤنٹ حذف کریں',
    'This will permanently delete your account and all data. This action cannot be undone.': 'یہ آپ کا اکاؤنٹ اور تمام ڈیٹا مستقل طور پر حذف کر دے گا۔',
    'Edit Hospital Profile': 'ہسپتال پروفائل تبدیل کریں',
    'Hospital Name': 'ہسپتال کا نام',
    'Back to Profile': '← پروفائل پر واپس',

    // Appointments
    '+ Book New Appointment': '+ نئی اپوائنٹمنٹ بک کریں',
    'Book New Appointment': '+ نئی اپوائنٹمنٹ بک کریں',
    'No appointments yet.': 'ابھی کوئی اپوائنٹمنٹ نہیں۔',
    'Search hospitals and book your first appointment': 'ہسپتال تلاش کریں اور پہلی اپوائنٹمنٹ بک کریں',
    'Vaccine': 'ویکسین',
    'Appointment Date': 'اپوائنٹمنٹ تاریخ',
    'Test Result': 'ٹیسٹ نتیجہ',
    'Not available': 'دستیاب نہیں',
    'View Full Result': 'مکمل نتیجہ دیکھیں',
    'Vaccination Card': 'ویکسینیشن کارڈ',
    'Vaccination given': 'ویکسینیشن دی گئی',

    // Search
    'Search for COVID-19 test and vaccination hospitals near you.': 'اپنے قریب کووڈ-19 ٹیسٹ اور ویکسینیشن ہسپتال تلاش کریں۔',
    'Search by hospital name or city...': 'نام یا شہر سے تلاش کریں...',
    'Search': 'تلاش',
    'Clear': 'صاف کریں',
    'Select Vaccine': 'ویکسین منتخب کریں',
    'Book Appointment': 'اپوائنٹمنٹ بک کریں',
    'No approved hospitals available.': 'کوئی ہسپتال دستیاب نہیں۔',
    '✓ Approved': '✓ منظور شدہ',

    // Tracking
    'Vaccination Tracking': 'ویکسینیشن ٹریکنگ',
    'Vaccination History': 'ویکسینیشن تاریخ',
    'Appointment History': 'اپوائنٹمنٹ تاریخ',
    'No vaccinations recorded yet.': 'کوئی ویکسینیشن ریکارڈ نہیں۔',
    'No appointment history yet.': 'کوئی اپوائنٹمنٹ تاریخ نہیں۔',
    'Done': 'مکمل',
    'View': 'دیکھیں',
    'Wear a Mask': 'ماسک پہنیں',
    'Hand Hygiene': 'ہاتھ کی صفائی',
    'Social Distancing': 'سماجی فاصلہ',
    'Get Vaccinated': 'ویکسین لگوائیں',
    'Isolate if Positive': 'مثبت ہونے پر تنہائی',
    'Ventilation': 'ہوا کا گزر',
    'COVID-19 Safety Guidelines': 'کووڈ-19 حفاظتی ہدایات',
    'Always wear a well-fitted mask in public spaces, especially in crowded or poorly ventilated areas.': 'عوامی جگہوں پر ہمیشہ ماسک پہنیں۔',
    'Wash hands frequently with soap for at least 20 seconds or use an alcohol-based hand sanitizer.': 'ہاتھ باقاعدگی سے صابن سے دھوئیں۔',
    'Maintain at least 6 feet distance from others who are not from your household.': 'دوسروں سے کم از کم 6 فٹ فاصلہ رکھیں۔',
    'COVID-19 vaccines are safe and effective. Getting vaccinated protects you and those around you.': 'ویکسین محفوظ اور مؤثر ہے۔',
    'If you test positive, isolate immediately for at least 5-7 days and inform close contacts.': 'مثبت ٹیسٹ پر فوری تنہائی اختیار کریں۔',
    'If you test positive, isolate immediately for at least 5–7 days and inform close contacts.': 'مثبت ٹیسٹ پر فوری تنہائی اختیار کریں۔',
    'Ensure good air circulation in indoor spaces by opening windows and using air filtration systems.': 'اندرونی جگہوں میں ہوا کی آمدورفت یقینی بنائیں۔',

    // Auth
    'Login': 'لاگ ان',
    'Email Address': 'ای میل پتہ',
    'Email': 'ای میل',
    'Password': 'پاس ورڈ',
    'Sign In': 'سائن ان',
    'Forgot Password?': 'پاس ورڈ بھول گئے؟',
    'New to portal?': 'پورٹل پر نئے ہیں؟',
    'Register Patient': 'مریض رجسٹر کریں',
    'Register Hospital': 'ہسپتال رجسٹر کریں',
    'Welcome Back': 'خوش آمدید',
    'Sign in to your account': 'اپنے اکاؤنٹ میں لاگ ان کریں',
    'COVID-19 Vaccination Portal': 'کووڈ-19 ویکسینیشن پورٹل',
    'Pakistan National COVID-19 System': 'پاکستان قومی کووڈ-19 سسٹم',
    'Pakistan COVID-19 System': 'پاکستان کووڈ-19 سسٹم',
    'Support & Information': 'سپورٹ اور معلومات',
    'User Guide': 'صارف گائیڈ',
    'Security Awareness': 'سیکیورٹی آگاہی',
    'Contact Us': 'ہم سے رابطہ کریں',
    'Locate Us / FAQ': 'ہمیں تلاش کریں / سوالات',
    'COVID-19 Helpline': 'کووڈ-19 ہیلپ لائن',
    'Toll Free — 24/7': 'مفت — 24/7',
    'Toll Free - 24/7': 'مفت — 24/7',
    'COVID Vaccination': 'کووڈ ویکسینیشن',
    'Book your dose today': 'آج اپنی خوراک بک کریں',
    'Trusted Hospitals': 'قابل اعتماد ہسپتال',
    'Verified & approved': 'تصدیق شدہ اور منظور شدہ',
    'View results online': 'نتائج آن لائن دیکھیں',
    'Already have an account?': 'پہلے سے اکاؤنٹ ہے؟',
    'Helpline': 'ہیلپ لائن',
    'Helpline:': 'ہیلپ لائن:',

    // Review popup
    'Rate Your Experience': 'اپنا تجربہ بتائیں',
    'Your feedback helps us improve!': 'آپ کی رائے ہماری مدد کرتی ہے!',
    'Tap a star to rate': 'ریٹنگ دینے کے لیے ستارہ دبائیں',
    'Write your review... (optional)': 'اپنا تبصرہ لکھیں... (اختیاری)',
    'Skip & Logout': 'چھوڑیں اور لاگ آؤٹ',
    'Submit & Logout': 'جمع کریں اور لاگ آؤٹ',
    'Please select a star rating!': 'براہ کرم ستارہ ریٹنگ منتخب کریں!',
    'Submitting...': 'جمع ہو رہا ہے...',

    // Hospital panel
    'Approve': 'منظور کریں',
    'Reject': 'مسترد کریں',
    'Mark Completed': 'مکمل نشان کریں',
    'Status': 'حالت',
    'Actions': 'اعمال',
    'Patient Name': 'مریض کا نام',
    'Hospital': 'ہسپتال',
    'No appointments found.': 'کوئی اپوائنٹمنٹ نہیں ملی۔',
    'No patients found.': 'کوئی مریض نہیں ملا۔',
    'Add Vaccine': 'ویکسین شامل کریں',
    'Vaccine Name': 'ویکسین کا نام',
    'Stock': 'اسٹاک',
    'Add': 'شامل کریں',
    'Update Stock': 'اسٹاک اپ ڈیٹ کریں',
    'Delete': 'حذف کریں',
    'No vaccines found.': 'کوئی ویکسین نہیں ملی۔',

    // Result page
    'COVID-19 Test Result': 'کووڈ-19 ٹیسٹ نتیجہ',
    'Back to My Appointments': '← میری اپوائنٹمنٹس پر واپس',
    'Test Date': 'ٹیسٹ تاریخ',
    'Result': 'نتیجہ',
    'POSITIVE': 'مثبت',
    'NEGATIVE': 'منفی',
    "Doctor's Notes": 'ڈاکٹر کے نوٹس',
    'Dose Number': 'خوراک نمبر',
    'Vaccination Date': 'ویکسینیشن تاریخ',
    'Batch No': 'بیچ نمبر',
    'Vaccination Suggestion': 'ویکسینیشن تجویز',
    'Vaccination Record': 'ویکسینیشن ریکارڈ',

    // Admin pages
    'All Hospitals': 'تمام ہسپتال',
    'All Patients': 'تمام مریض',
    'View Details': 'تفصیلات دیکھیں',
    'No hospitals found.': 'کوئی ہسپتال نہیں ملا۔',
    'No data found.': 'کوئی ڈیٹا نہیں ملا۔',
    'Filter': 'فلٹر',
    'Export': 'برآمد',

    // Contact page
    'For any queries or support, reach out to the Covid Vaccination Portal admin team.': 'کسی بھی سوال یا مدد کے لیے کووڈ ویکسینیشن پورٹل ایڈمن ٹیم سے رابطہ کریں۔',
    'Office Hours': 'دفتری اوقات',
    'Mon – Fri: 9:00 AM – 5:00 PM': 'پیر – جمعہ: صبح 9:00 – شام 5:00',
    'Saturday & Sunday: Closed': 'ہفتہ اور اتوار: بند',
    'Send us a Message': 'ہمیں پیغام بھیجیں',
    'Your message has been sent successfully. We will get back to you soon.': 'آپ کا پیغام کامیابی سے بھیج دیا گیا۔ ہم جلد آپ سے رابطہ کریں گے۔',
    'Your Name': 'آپ کا نام',
    'Subject': 'موضوع',
    'Message': 'پیغام',
    'Write your message here...': 'یہاں اپنا پیغام لکھیں...',
    'Send Message': 'پیغام بھیجیں',
    'Ministry of Health, Islamabad, Pakistan': 'وزارت صحت، اسلام آباد، پاکستان',

    // Common
    'Male': 'مرد',
    'Female': 'عورت',
    'Other': 'دیگر',
    'Name': 'نام',
    'Phone': 'فون',
    'Submit': 'جمع کریں',
    'Update': 'اپ ڈیٹ',
    'Back': 'واپس',
    'Close': 'بند کریں',
    'Yes': 'ہاں',
    'No': 'نہیں',
    'Loading...': 'لوڈ ہو رہا ہے...',
    'Patient Reviews': 'مریضوں کے تبصرے',
    'No reviews yet': 'ابھی کوئی تبصرہ نہیں',
    'Unknown': 'نامعلوم',
    'Print Card': 'کارڈ پرنٹ کریں',
    'Edit': 'ترمیم',
    'National COVID-19 Vaccination Certificate': 'قومی کووڈ-19 ویکسینیشن سرٹیفکیٹ',

    // Registration
    'Patient Registration': 'مریض رجسٹریشن',
    'Hospital Registration': 'ہسپتال رجسٹریشن',
    'Confirm Password': 'پاس ورڈ کی تصدیق',
    'Register as Patient': 'مریض کے طور پر رجسٹر کریں',
    'Register as Hospital': 'ہسپتال کے طور پر رجسٹر کریں',
    'Forgot Password': 'پاس ورڈ بھول گئے',
    'Send Reset PIN': 'ری سیٹ پن بھیجیں',
    'Enter your registered email': 'اپنا رجسٹرڈ ای میل درج کریں',
    'Reset your password': 'اپنا پاس ورڈ ری سیٹ کریں',
    'Enter PIN': 'پن درج کریں',
    'New Password': 'نیا پاس ورڈ',
    'Reset Password': 'پاس ورڈ ری سیٹ کریں',
    'Covid Vaccination Portal - Pakistani Nationals Only': 'کووڈ ویکسینیشن پورٹل — صرف پاکستانی شہریوں کے لیے',
    'Covid Vaccination Portal - Admin': 'کووڈ ویکسینیشن پورٹل — ایڈمن',
    'Covid Vaccination Portal - Hospital': 'کووڈ ویکسینیشن پورٹل — ہسپتال',
    'Covid Vaccination Portal - Patient': 'کووڈ ویکسینیشن پورٹل — مریض',
    'Covid Vaccination Portal — Patient': 'کووڈ ویکسینیشن پورٹل — مریض',
    'Covid Vaccination Portal — Admin': 'کووڈ ویکسینیشن پورٹل — ایڈمن',
    'Covid Vaccination Portal — Hospital': 'کووڈ ویکسینیشن پورٹل — ہسپتال',

    // Result messages
    'Your COVID-19 test is Negative.': 'آپ کا کووڈ-19 ٹیسٹ منفی ہے۔',
    'Your COVID-19 test is Positive.': 'آپ کا کووڈ-19 ٹیسٹ مثبت ہے۔',
    'Your result is still pending.': 'آپ کا نتیجہ ابھی تک زیر التواء ہے۔',
    'You are eligible to receive the vaccine.': 'آپ ویکسین لینے کے اہل ہیں۔',
    'Vaccination is not recommended at this time.': 'اس وقت ویکسینیشن کی سفارش نہیں کی جاتی۔',
    'Please wait for the hospital to update your test result.': 'براہ کرم ہسپتال کا انتظار کریں۔',
    'No test result available yet.': 'ابھی کوئی ٹیسٹ نتیجہ دستیاب نہیں۔',
};

// ============================================================
// Core translation engine
// ============================================================
var _originals = new Map();

function walkAndTranslate(root, lang) {
    var dict = lang === 'ur' ? UR : null;
    var walker = document.createTreeWalker(
        root,
        NodeFilter.SHOW_TEXT,
        {
            acceptNode: function(node) {
                var parent = node.parentElement;
                if (!parent) return NodeFilter.FILTER_REJECT;
                var tag = parent.tagName.toLowerCase();
                if (['script','style','svg','path','circle','line','polyline','polygon','rect','use'].indexOf(tag) !== -1)
                    return NodeFilter.FILTER_REJECT;
                if (parent.closest && parent.closest('svg'))
                    return NodeFilter.FILTER_REJECT;
                return NodeFilter.FILTER_ACCEPT;
            }
        },
        false
    );

    var nodes = [];
    var node;
    while ((node = walker.nextNode())) nodes.push(node);

    nodes.forEach(function(n) {
        if (!_originals.has(n)) {
            _originals.set(n, n.textContent);
        }
        var original = _originals.get(n);
        var trimmed = original.trim();
        if (!trimmed) return;

        if (lang === 'ur') {
            if (dict[trimmed]) {
                n.textContent = original.replace(trimmed, dict[trimmed]);
                return;
            }
            var lc = trimmed.toLowerCase();
            for (var k in dict) {
                if (k.toLowerCase() === lc) {
                    n.textContent = original.replace(trimmed, dict[k]);
                    return;
                }
            }
            // partial replacement — longer keys first
            var result = original;
            var keys = Object.keys(dict).sort(function(a, b) { return b.length - a.length; });
            keys.forEach(function(k) {
                if (result.indexOf(k) !== -1) {
                    result = result.split(k).join(dict[k]);
                }
            });
            if (result !== original) n.textContent = result;
        } else {
            // restore original English
            n.textContent = original;
        }
    });

    // placeholders
    root.querySelectorAll('[placeholder]').forEach(function(el) {
        if (!el._origPlaceholder) el._origPlaceholder = el.placeholder;
        if (lang === 'ur' && dict && dict[el._origPlaceholder]) {
            el.placeholder = dict[el._origPlaceholder];
        } else {
            el.placeholder = el._origPlaceholder || el.placeholder;
        }
    });

    // data-i18n attributes
    root.querySelectorAll('[data-i18n]').forEach(function(el) {
        var key = el.getAttribute('data-i18n');
        if (lang === 'ur' && UR[key]) el.textContent = UR[key];
        else if (lang === 'en') el.textContent = key;
    });
}

function applyTranslation(lang) {
    walkAndTranslate(document.body, lang);
}

// ============================================================
// Settings popup toggle helpers (used by both layouts)
// ============================================================
function toggleSettings() {
    var popup = document.getElementById('settings-popup');
    if (popup) popup.classList.toggle('open');
}

function toggleMobileSettings() {
    var popup = document.getElementById('mobile-settings-popup');
    if (popup) popup.classList.toggle('hidden');
}

document.addEventListener('click', function(e) {
    var popup = document.getElementById('settings-popup');
    if (popup && popup.classList.contains('open')) {
        if (!popup.contains(e.target) && !e.target.closest('[onclick*="toggleSettings"]'))
            popup.classList.remove('open');
    }

    var mPopup = document.getElementById('mobile-settings-popup');
    if (mPopup && !mPopup.classList.contains('hidden')) {
        if (!mPopup.contains(e.target) && !e.target.closest('[onclick*="toggleMobileSettings"]'))
            mPopup.classList.add('hidden');
    }
});

// ============================================================
// Dark theme helpers
// ============================================================
function _syncDarkToggles(isDark) {
    [['dark-toggle','dark-knob'],['mob-dark-toggle','mob-dark-knob'],
     ['app-dark-toggle','app-dark-knob']].forEach(function(pair) {
        var tog  = document.getElementById(pair[0]);
        var knob = document.getElementById(pair[1]);
        if (tog)  tog.style.background  = isDark ? '#10b981' : '#374151';
        if (knob) knob.style.transform = isDark ? 'translateX(20px)' : 'translateX(0)';
    });
}

function toggleDark() {
    var isDark = document.body.classList.toggle('dark-theme');
    localStorage.setItem('theme', isDark ? 'dark' : 'light');
    _syncDarkToggles(isDark);
}

// alias used by app.blade.php
function toggleAppDark() { toggleDark(); }

// ============================================================
// Auto-apply saved settings on page load
// Language source of truth = Laravel session (data-locale on <body>)
// We only use it for JS-side DOM translation of hardcoded strings.
// We do NOT change the URL or session from JS — language switching
// always goes through the /lang/{lang} Laravel route.
// ============================================================
(function () {
    // 1. Dark theme
    var isDark = localStorage.getItem('theme') === 'dark';
    if (isDark) {
        document.body.classList.add('dark-theme');
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', function () { _syncDarkToggles(true); });
        } else {
            _syncDarkToggles(true);
        }
    }

    // 2. Language — read from <body data-locale="..."> set by Laravel blade
    //    This ensures JS always agrees with what the server rendered.
    function initLang() {
        var locale = document.body.getAttribute('data-locale') || 'en';
        if (locale === 'ur') {
            applyTranslation('ur');
        }
        // sync any lang-select dropdowns if present
        ['lang-select','mob-lang-select'].forEach(function(id) {
            var el = document.getElementById(id);
            if (el) el.value = locale;
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initLang);
    } else {
        initLang();
    }
})();
