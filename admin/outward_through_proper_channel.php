<?php require_once "../includes/admin/header.php"; ?>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Start Left menu area -->
<?php require_once "../includes/admin/side_bar.php"; ?>
<!-- End Left menu area -->
<!-- Start Welcome area -->
<div class="all-content-wrapper">
    <?php require_once "../includes/admin/nav.php";

    require "../app/manager/OutwardManager.php";
    $user_obj = $_SESSION['Member_obj'];
    $user_id = $user_obj[0]['USER_ID'];
    $columns = "DEPT_ID as USER_ID,FAC_ID,INST_ID,DEPT_NAME as 'NAME',IS_INST,`CODE`,REMARKS,USER_TEMP,PASS_TEMP,CITY_NAME";
    $tables = "department";
    $condition = "((DEPT_ID <> $user_id) AND (IS_INST ='Y' OR IS_INST = 'N'))";
    $list = getDataStaticQuery($columns, $tables, $condition);

    $pre_out_no = getLastOutWardNo($user_id);
    if (!$pre_out_no) {
        $pre_out_no = 0;
    }
    $bool = false;
    $point = "";
    $mesg = "";
    if (isset($_GET['mesg'])) {
//        $bool=true;
        $point = $_GET['mesg'];
    }
    $current_date = Date('m/d/Y');
    ?>


    <div id="min-height" class="container-fluid" style="padding:30px">
        <div class="content">

            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="card text-center ">
                            <h2>Outward Through Proper Channel</h2>
                        </div>
                        <form action="outward_channel_handler.php" id="main_form"
                              onsubmit="return confirm('Are you sure to send letter')" method="post"
                              enctype="multipart/form-data">
                            <div class="row" id="info_label">
                                <div class="col-md-1"></div>
                                <div class="col-md-10" id="info_label">
                                    <div class="alert alert-info" style="text-align: center">
                                        <label style='font-size: x-large;'>Letter path follows from top to down route
                                            first one is start and last is destination select atleast two </label>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-8">
                                    <div class="top-margin">
                                        <label for="exampleInput1" class="bmd-label-floating">Select The Path
                                            <span class="text-danger">*</span></label>
                                        <select class="form-control" id="path_selector" name="selector" required>
                                            <option value="0">---Choose---</option>
                                            <?php
                                            foreach ($list as $key) {
                                                ?>
                                                <option value="<?= $key['USER_ID'] ?>"><?= $key['NAME'] ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="top-margin" style="padding-top: 26px">
                                        <input type="button" value="Add" class="btn btn-round btn-fab-mini"
                                               onclick="addElement()">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="top-margin" style="padding-top: 26px">
                                        <input type="button" value="Remove" class="btn btn-round btn-fab-mini"
                                               onclick="removeElement()">
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1" id="set_label"></div>
                                <div class="col-md-8" id="to_add">
                                </div>
                                <div class="col-md-2">
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <div class="top-margin">
                                        <label for="exampleInput1" class="bmd-label-floating">Previous Outward No
                                            <span class="text-danger"></span></label>
                                        <input type="text" value="<?= $pre_out_no ?>" class="form-control" disabled/>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="top-margin">
                                        <label for="exampleInput1" class="bmd-label-floating">Outward No
                                            <span class="text-danger">*</span></label>
                                        <input type="text" id="outward_no" class="form-control" name="outward_no"
                                               value="<?= $pre_out_no ?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <div class="top-margin">
                                        <label for="exampleInput1" class="bmd-label-floating">Outward Date
                                            <span class="text-danger">*</span></label>
                                        <input type="text" id="outward_date" value="<?= $current_date ?>"
                                               class="form-control" name="outward_date" required/>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="top-margin">
                                        <label for="exampleInput1" class="bmd-label-floating">Subject
                                            <span class="text-danger">*</span></label>
                                        <input type="text" id="subject" class="form-control" name="subject" required/>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <div class="top-margin">
                                        <label for="exampleInput1" class="bmd-label-floating">File No
                                            <span class="text-danger"></span></label>
                                        <input type="text" id="file_no" class="form-control" name="file_no"/>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="top-margin">
                                        <label for="exampleInput1" class="bmd-label-floating">Postage Charges
                                            <span class="text-danger"></span></label>
                                        <input type="text" id="postage_charges" class="form-control"
                                               name="postage_charges"/>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="top-margin">
                                        <label for="exampleInput1" class="bmd-label-floating">Remarks
                                            <span class="text-danger"></span></label>
                                        <input type="text" id="remarks" class="form-control" name="remarks"/>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="top-margin">
                                        <label for="exampleInput1" class="bmd-label-floating">Select File
                                            <span class="text-danger"></span></label>
                                        <input type="file" accept=".doc,.docx,.xls,.xlsx,.ppt,.pptx,.pdf,.jpeg,.jpg"
                                               class="form-control" id="letter" name="letter">
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-5"></div>
                                <div class="col-md-2">
                                    <div class="top-margin">
                                        <input type="hidden" id="hidden_count" name="counter" hidden>
                                        <input type="submit" value="Send" name="send" id="send"
                                               class="btn btn-round btn-success">
                                    </div>
                                </div>
                                <div class="col-md-5"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php require_once "../includes/admin/footer_area.php"; ?>
</div>

<script>
    var count = 0;

    function addElement() {
        count++;
        let e = document.getElementById("path_selector");
        let val = e.options[e.selectedIndex].value;
        let text = e.options[e.selectedIndex].text;
        let len = e.options.length;

        if (val != 0) {
            let input_show = document.createElement('input');
            let input_hide = document.createElement('input');

            input_hide.setAttribute('type', 'hidden');
            input_hide.setAttribute('class', 'form-control');
            input_hide.setAttribute('id', 'a' + count);
            input_hide.setAttribute('name', 'a' + count);
            input_hide.setAttribute('value', val);
            input_hide.hidden = true;

            input_show.setAttribute('type', 'text');
            input_show.setAttribute('class', 'form-control');
            input_show.setAttribute('id', 'b' + count);
            input_show.setAttribute('name', 'b' + count);
            input_show.setAttribute('value', text);
            input_show.disabled = true;

            document.getElementById('to_add').appendChild(input_hide);
            document.getElementById('to_add').appendChild(input_show);

            for (i = 0; i < len; i++) {
                if (e.options[i].value === val) {
                    e.options[i] = null;
                    break;
                }
            }
            let input = document.getElementById('hidden_count').setAttribute('value', count.toString());
        }
    }

    function removeElement() {
        let div = document.getElementById('to_add');
        let sel = document.getElementById("path_selector");
        let val = document.getElementById('a' + count);
        let txt = document.getElementById('b' + count);
        let opt = document.createElement("option");
        opt.appendChild(document.createTextNode(txt.value));
        opt.value = val.value;
        sel.appendChild(opt);

        div.removeChild(val);
        div.removeChild(txt);
        count--;
        let input = document.getElementById('hidden_count').setAttribute('value', '' + count);
    }

    document.getElementById('<?= $point ?>').style.borderColor = '#f73905';
</script>

<?php require_once "../includes/admin/footer.php"; ?>