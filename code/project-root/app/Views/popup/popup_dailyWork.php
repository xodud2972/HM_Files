<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AMS 가망 광고주 등록</title>
    <!-- Bootstrap Core CSS -->
    <link href="/bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="/bootstrap/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS,Fonts -->
    <link href="/bootstrap/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="/bootstrap/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- jQuery -->
    <script src="/bootstrap/vendor/jquery/jquery.min.js"></script>
    <!-- bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- moment -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.3/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.3/moment-with-locales.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.3/locale/ko.js"></script>
    <!-- bootstrap datetimepicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

    <style>
        .modal {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: none;
            background-color: rgba(0, 0, 0, 0.4);
        }
        .modal.show {
            display: block;
        }
        .modal_body {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 1100px;
            height: 800px;
            padding: 40px;
            background-color: rgb(255, 255, 255);
            border-radius: 10px;
            box-shadow: 0 2px 3px 0 rgba(34, 36, 38, 0.15);
            transform: translateX(-50%) translateY(-50%);
        }
    </style>

</head>
<body>
    <div class="panel-body">
        
        <h3><b>가망 광고주 등록</b></h3>
        <div style=" width: fit-content; margin: auto; display: block;">
        <input type="text" name="reg_adName" size="15" style="width: 250px; height: 45px; text-align:center;" placeholder="ex) 53cost">
        <input type="text" name="reg_adEmail" size="15" style="width: 250px; height: 45px; text-align:center;" placeholder="ex) xodud2972@naver.com">
        <input type="text" name="reg_cell" size="15" style="width: 250px; height: 45px; text-align:center;" placeholder="ex) 01049932972">
            <button id="addBtn" type="button" class="btn btn-primary btn-open-popup" style="width: 250px; height: 45px;" >가망 광고주 추가</button>
        </div>


        <h3><b>가망 광고주 리스트</b></h3>
        <div style=" width: fit-content; margin: auto; display: block; margin-bottom: 40px;">
            <input type="text" name="ad_name" size="15" style="width: 250px; height: 45px; text-align:center;" placeholder="가망 광고주명">
            <input type="text" name="ad_email" size="15" style="width: 250px; height: 45px; text-align:center;" placeholder="가망 광고주 이메일">
            <input type="text" name="ad_cell" size="15" style="width: 250px; height: 45px; text-align:center;" placeholder="가망 광고주 전화번호">
            <button id="searchBtn" type="button" class="btn btn-primary" style="width: 150px; height: 45px;">조회</button>
        </div>


        <!-- 가망 광고주 테이블 표 -->
        <div style="width:100%; height:650px; overflow:auto">
            <table width="100%" class="table  table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="text-align:center"><b>등록일</b></th>
                        <th style="text-align:center"><b>가망 광고주명</b></th>
                        <th style="text-align:center"><b>전화번호</b></th>
                        <th style="text-align:center"><b>이메일</b></th>
                        <th style="text-align:center"><b>수정</b></th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < 9; $i++) {  ?>
                        <tr>
                            <td style="text-align:center">
                                <input type="text" value="2021.06.11" size="15" style="width:100%; border: 0; text-align:center;">
                            </td>
                            <td style="text-align:center">
                                <input type="text" value="아모레퍼시픽" size="15" style="width:100%; border: 0; text-align:center;">
                            </td>
                            <td style="text-align:center">
                                <input type="text" value="010-4993-2972" size="15" style="width:100%; border: 0; text-align:center;">
                            </td>
                            <td style="text-align:center">
                                <input type="text" value="xodud2972@naver.com" size="15" style="width:100%; border: 0; text-align:center;">
                            </td>
                            <td style="text-align:center">
                                <button id="editBtn" type="button" class="btn btn-success">수정</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <input type="text" value="" name="feedback" size="15" placeholder="피드백을 입력해주세요" style="width:92%; height: 45px; text-align:center; margin-top: 10px;">
            <button id="regBtn" type="button" class="btn btn-info" style="width: 90px; height: 45px; float: right; margin-top: 10px;">등록</button>
        </div>
        <button class="btn btn-info" id="btnClose" type="button" style="margin: auto; display: block; " onclick="framclose()">닫기</button>
    </div>


<!-- modal page source -->
    <div class="modal">
        <div class="modal_body">
            <h3><b>가망 상세 정보</b></h3>
            <div class="panel-body">
                <div style="width:100%; height:650px;">
                
                
                <!-- 1. 광고주 정보 테이블 -->
                    <table width="100%" class="table table-bordered" id="firstTable">
                        <h3>광고주 정보</h3>
                        <thead style="background-color: white;">
                            <tr>
                                <th style="text-align:center">V 광고주명</th>
                                <th style="text-align:center; background-color: white;"><input type="text" value="53cost" name="cs_name" size="15" style="width:100%; border: 0; text-align:center;"></th>
                                <th style="text-align:center">사업자 번호</th>
                                <th style="text-align:center; background-color: white;"><input type="text" value="" name="cs_num" size="15" style="width:100%; font-weight: 100; text-align:center;"></th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td style="text-align:center; background-color: #f6f6f6;"><b>업종(신규1차카테고리)</b></td>
                                <td style="text-align:center">
                                    <select style="width: 100%; text-align:center; border: none;" class="form-select" aria-label="Default select example">
                                        <option>업종</option>
                                        <option>식당</option>
                                        <option>노래방</option>
                                    </select>
                                </td>
                                <td style="text-align:center; background-color: #f6f6f6;" ><b>회사 대표 URL</b></td>
                                <td style="text-align:center"><input type="text" value="" name="url" size="15" style="width:100%; border: 0; text-align:center;"></td>
                            </tr>

                            <tr>
                                <td style="text-align:center; background-color: #f6f6f6;"><b>구분(신규/이전)</b></td>
                                <td style="text-align:center; ">
                                    <select style="width: 100%; text-align:center; border: none;" class="form-select" aria-label="Default select example">
                                        <option>구분</option>
                                        <option>식당</option>
                                        <option>노래방</option>
                                    </select>
                                </td>
                                <td style="text-align:center; background-color: #f6f6f6;"><b>회사 등록일</b></td>
                                <td style="text-align:center"><input type="text" value="2022-02-04" name="rg_date" size="15" style="width:100%; border: 0; text-align:center;"></td>
                            </tr>                            
                        </tbody>
                    </table>


                <!-- 2. 업체 담당자 정보 테이블 -->
                    <h3>업체 담당자 정보</h3>
                        <table class="table table-bordered" style="text-align: center;">
                            <thead style="text-align: center;">
                                <tr style="text-align: center;">
                                    <th class="col-lg-3" style="text-align: center;">담당자명</th>
                                    <th class="col-lg-3" style="text-align: center; background-color: white; font-weight: 100;"><input type="text" value="" name="em_name" size="15" style="width:100%; border: 0; text-align:center;"></th>
                                    <th class="col-lg-3" style="text-align: center;">V 연락처</th>
                                    <th class="col-lg-3" style="text-align: center; background-color: white;"><input type="text" value="01049932972" name="cell" size="15" style="width:100%; border: 0; text-align:center;"></th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                                <tr style="text-align: center;">
                                    <td style="background-color: #f6f6f6;"><b>V 이메일</b></td>
                                    <td colspan="3"><input type="text" value="xodud2972@naver.com" name="email" size="15" style="width:100%; border: 0; text-align:center; font-weight:bold"></td>
                                </tr>
                            </tbody>
                        </table>

                    <!-- 3. 문의 정보 테이블 -->
                        <h3>문의 정보</h3>
                        <table class="table table-bordered" style="text-align: center;">
                            <thead style="text-align: center;">
                                <tr style="text-align: center;">
                                    <th style="text-align: center;">광고 예산</th>
                                    <th style="text-align: center; background-color: white; font-weight: 100;"><input type="text" value="" name="budget" size="15" style="width:100%; border: 0; text-align:center;"></th>
                                    <th class="col-lg-3" style="text-align: center;">업체 집행 광고</th>
                                    <th style="text-align: center; background-color: white; font-weight: 100;">
                                        <select style="width: 100%; text-align:center; border: none;" class="form-select" aria-label="Default select example">
                                            <option>업체 집행 광고</option>
                                            <option>식당</option>
                                            <option>노래방</option>
                                        </select>
                                    </th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                                <tr style="text-align: center;">
                                    <td class="col-lg-3" style="background-color: #f6f6f6;"><b>대표 키워드</b></td>
                                    <td><input type="text" value="" name="keyword" size="15" style="width:100%; border: 0; text-align:center;"></td>
                                    <td style="background-color: #f6f6f6;"><b>문의 광고</b></td>
                                    <td>
                                        <select style="width: 100%; text-align:center; border: none;" class="form-select" aria-label="Default select example">
                                            <option>문의 광고</option>
                                            <option>식당</option>
                                            <option>노래방</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr style="text-align: center;">
                                    <td style="background-color: #f6f6f6;"><b>문의 내용</b></td>
                                    <td colspan="3"><input type="text" value="" name="content" size="15" style="width:100%; border: 0; text-align:center;"></td>
                                </tr>
                            </tbody>
                        </table>

                    <!-- 4. 업체 정보 테이블 -->
                        <h3>업체 정보</h3>
                        <table class="table table-bordered" style="text-align: center;">
                            <thead style="text-align: center;">
                                <tr style="text-align: center;">
                                    <th style="text-align: center;">가망 광고주 정보 흭득 채널</th>
                                    <th class="col-lg-7" style="text-align: center; background-color: white; font-weight: 100;"><input type="text" value="" name="channel" size="15" style="width:100%; border: 0; text-align:center;"></th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                                <tr style="text-align: center;">
                                    <td style="background-color: #f6f6f6;"><b>가망광고주 인입 실패 포인트</b></td>
                                    <td colspan="3"><input type="text" value="" name="fail_Point" size="15" style="width:100%; border: 0; text-align:center;"></td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="width: fit-content; margin: auto; display: block;">
                            <button class="btn btn-info" id="modalSave" type="button">저장</button>
                            <button class="btn btn-info" id="modalClose" type="button">취소</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
        const body = document.querySelector('body');
        const modal = document.querySelector('.modal');
        const btnOpenPopup = document.querySelector('.btn-open-popup');
        const closeModal = document.querySelector('#modalClose');

        btnOpenPopup.addEventListener('click', () => {
            modal.classList.toggle('show');

            if (modal.classList.contains('show')) {
                body.style.overflow = 'hidden';
            }
        });

        modal.addEventListener('click', (event) => {
            if (event.target === modal) {
                modal.classList.toggle('show');

                if (!modal.classList.contains('show')) {
                    body.style.overflow = 'auto';
                }
            }
        });

        // modal취소버튼 클릭 이벤트
        closeModal.addEventListener('click', () => {
        modal.classList.remove('show')
        })

        $(function() {
            $('#datetimepicker1').datetimepicker({
                format: 'YYYY-MM-DD'
            });
        });

        function framclose() {
            window.close();
        }
    </script>
</html>