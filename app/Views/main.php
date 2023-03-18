<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>
<div class="jumbotron">
    <h3>코드 이그나이터의 세계에 오신것을 환영합니다.</h3>
    <p>코드이그나이터(CodeIgniter)는 PHP를 사용하여 웹 사이트를 구축하는 사람들을 위한 어플리케이션 개발 프레임워크입니다.
        풍부한 라이브러리 세트와 이러한 라이브러리에 액세스할 수 있는 간단한 인터페이스 및 논리적 구조를 제공하여 프로젝트에 창의적으로 집중할 수 있으며, 코드를 처음부터 작성하는 것보다 적은 양의 코드로 빠르게 프로젝트를 개발할 수 있습니다.</p>
    <p>이 사이트는 코드이그나이터 사용자의 이해를 돕기 위해 사용자 가이드에 포함된 샘플을 동작 가능하도록 수정하여 만들었습니다.
        코드이그나이터 프레임워크에 관심을 가진 모든 분들이 이 샘플을 통하여 코드이그나이터를 쉽게 이해하고 업무에 잘 활용하도록 도움이 되었으면 합니다.</p>
    <p>코드이그나이터 사용중 이해가 잘 가지 않거나 필요한 샘플이 있다면 아래 사이트에 남겨 주십시오.</p>
</div>
<hr>
<div class="row main-menu">
    <div class="col-xs-6 col-lg-4">
        <h3>헬퍼</h3>
        <ul>
            <li>Array</li>
            <li>Cookie</li>
            <li>Date</li>
            <li>Filesystem</li>
        </ul>
    </div><!--/.col-xs-6.col-lg-4-->
    <div class="col-xs-6 col-lg-4">
        <h3>컨트롤러와 라우팅</h3>
        <ul>
            <li>Controller</li>
            <li>Routing</li>
            <li>Filters</li>
            <li>IncommingRequest</li>
        </ul>
    </div><!--/.col-xs-6.col-lg-4-->
    <div class="col-xs-6 col-lg-4">
        <h3>라이브러리</h3>
        <ul>
            <li>페이지네이션</li>
            <li>폼검증</li>
            <li>CURLRequest</li>
        </ul>
    </div><!--/.col-xs-6.col-lg-4-->
    <div class="col-xs-6 col-lg-4">
        <h3>데이터베이스</h3>
        <ul>
            <li>빠른시작</li>
            <li>구성</li>
            <li>Query</li>
            <li>Query Result</li>
            <li>Query Helper</li>
            <li>Query Builder</li>
        </ul>
    </div><!--/.col-xs-6.col-lg-4-->
    <div class="col-xs-6 col-lg-4">
        <h3>모델</h3>
        <ul>
            <li>모델 기초</li>
            <li>모델 페이지네이션</li>
            <li>모델 데이터검증</li>
            <li>모델 이벤트</li>
            <li>Entity</li>
        </ul>
    </div><!--/.col-xs-6.col-lg-4-->
    <div class="col-xs-6 col-lg-4">
        <h3>응답 만들기</h3>
        <ul>
            <li>View</li>
            <li>View Cell</li>
            <li>View Layout</li>
            <li>View Parser</li>
            <li>HTML Table</li>
            <li>HTTP Response</li>
            <li>API Response Trait</li>
            <li>Localization</li>
        </ul>
    </div><!--/.col-xs-6.col-lg-4-->
</div>
<?= $this->endSection() ?>

