CKEDITOR.editorConfig = function (config) {

    config.toolbar = [
        {name: 'document', items: ['Source']},
        {name: 'clipboard', items: ['Undo', 'Redo']},
        {name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike']},
        {name: 'links', items: ['Link', 'Unlink']},
        {name: 'insert', items: ['Table']},
        {name: 'styles', items: ['Font', 'FontSize']},
        {name: 'colors', items: ['TextColor', 'BGColor']},
       {items: ['Ajaximage']},
        {name: 'tools', items: ['Maximize']}
        //유투브
        //  {name: 'youtube'}

    ];


    config.extraPlugins = 'ajaximage';
    config.extraAllowedContent = 'img[src,alt]'; // setData()에 img 허용
    config.font_defaultLabel = '맑은 고딕'; // 기본 폰트 지정
    config.font_names = '맑은 고딕; 돋움; 바탕; 돋음; 궁서;'; // 폰트 목록
    config.fontSize_defaultLabel = '12px'; // 기본 폰트 크기 지정
    config.fontSize_sizes = '12/12px;14/14px;16/16px;'; // 폰트 크기
    config.language = "ko"; // 언어타입
    config.resize_enabled = true; // 에디터 크기 조절 사용여부
    config.enterMode = CKEDITOR.ENTER_BR; // 엔터시 <br>
    config.shiftEnterMode = CKEDITOR.ENTER_P; // 쉬프트+엔터시 <p>
    config.toolbarCanCollapse = false; // 툴바 클릭시 접히는 여부
    config.menu_subMenuDelay = 0; // 메뉴 클릭 할 때 딜레이 값
    config.autoParagraph = false;
    config.protectedSource.push(/<\?[\s\S]*?\?>?/g);
    config.height = 400;
    config.allowedContent = true;
    //유투브
    // config.extraPlugins ='youtube';
    config.youtube_width = '640';//폭
    config.youtube_height = '480';//높이
    config.youtube_responsive = true;//반응형 너비에 맞추기
    config.youtube_related = true;//관련동영상표시
    config.youtube_older = false;//기존 소스 코드사용
    config.youtube_autoplay = false;//비디오자동시작
    config.youtube_controls = true;//플레이어컨트롤
    config.youtube_disabled_fields = [ 'txtEmbed', 'chkAutoplay'];//설정비활성
    CKEDITOR.plugins.addExternal( 'youtube', '/js/ckeditor/plugins/youtube/', 'plugin.js' );


    //config.startupFocus = true; // 글쓰기 시작시 포커스 사용여부
};