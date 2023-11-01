@extends('layouts.app')


@section('content')

<section id="about" class="about"> 

    <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="section-title">
          <h2>نبذه عن النظام</h2>
        </div>
  
        <div class="row content">
          <div class="col-lg-6">
            <p>
                التشخيصي هو مخُتبر في مدينة سبها يقوم عادة بإجراء الفحوص على العينات السريرية للحصول على معلومات عن صحة المريض كجزء من التشخيص والعلاج والوقاية من الأمراض.
            </p>
            <h4>فيما يلي أبرز مميزات نظام إدارة المختبر:</h4>
            <ul>
              <li><i class="ri-check-double-line"></i> إدارة التحاليل </li>
              <li><i class="ri-check-double-line"></i> تسجيل التحاليل للمرضى</li>
              <li><i class="ri-check-double-line"></i> إمكانية الاطلاع على نتائج التحاليل للمرضى</li>
              <li><i class="ri-check-double-line"></i> تفاصيل عن معدل الطبيعي للتحليل</li>
              <li><i class="ri-check-double-line"></i> إمكانية مراسلة المختبر من قبل المريض</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
                هو نظام يهدف إلى تنظيم وإدارة جميع العمليات التي تتم في المختبر، بما في ذلك إدارة التحاليل وتسجيل التحاليل للمرضى. يوفر النظام للمرضى إمكانية الاطلاع على نتائج التحاليل الخاصة بهم من خلال تطبيق مخصص، كما يوفر تفصيل عن معدل الطبيعي للتحليل. بالإضافة إلى ذلك، يمكن للمرضى مراسلة المختبر من خلال التطبيق لطرح الأسئلة أو تقديم الشكاوى.
            </p>
          </div>
        </div>
  
      </div>
    </section>

    @endsection
