<?php


class Page {

    public $firstRow	;

    public $listRows	;

    public $parameter  ;

    protected $totalPages  ;

    protected $totalRows  ;

    protected $nowPage    ;

    protected $coolPages   ;

    protected $rollPage   ;
    protected $pageNo   ;


    protected $config;
    /**
    +----------------------------------------------------------
     *
    +----------------------------------------------------------
     * @access public
    +----------------------------------------------------------
     * @param int $totalRows
     * @param int $listRows
     * @param array $parameter
    +----------------------------------------------------------
     */
    public function __construct($totalRows,$listRows,$parameter='',$pageNo='') {
        $this->totalRows = $totalRows;
        $this->parameter = $parameter;
        if($pageNo==''){
            $pageNo="p";
        }
        $this->pageNo = $pageNo;
        $this->rollPage = 5;
        $this->listRows = !empty($listRows)?$listRows:20;
        $this->totalPages = ceil($this->totalRows/$this->listRows);     //总页数
        $this->coolPages  = ceil($this->totalPages/$this->rollPage);
        $this->nowPage  = !empty($_GET[$this->pageNo])?$_GET[$this->pageNo]:1;
        if(!empty($this->totalPages) && $this->nowPage>$this->totalPages) {
            $this->nowPage = $this->totalPages;
        }
        $this->firstRow = $this->listRows*($this->nowPage-1);



            $this->config  =	array('header'=>'','prev'=>"<",'next'=>'>','first'=>'<<','last'=>'>>','theme'=>'%header% %first% %upPage% %linkPage% %downPage% %end%');



    }

    public function setConfig($name,$value) {
        if(isset($this->config[$name])) {
            $this->config[$name]    =   $value;
        }
    }

    /**
    +----------------------------------------------------------
     *
    +----------------------------------------------------------
     * @access public
    +----------------------------------------------------------
     */
    public function show() {
        if(0 == $this->totalRows) return '';
        $p = $this->pageNo;

        $nowCoolPage      = ceil($this->nowPage/$this->rollPage);
        $url  =  $_SERVER['REQUEST_URI'].(strpos($_SERVER['REQUEST_URI'],'?')?'':"?").$this->parameter;

        $parse = parse_url($url);
        if(isset($parse['query'])) {
            parse_str($parse['query'],$params);
            unset($params[$p]);
            $url   =  $parse['path'].'?'.http_build_query($params);
        }



        $upRow   = $this->nowPage-1;
        $downRow = $this->nowPage+1;
        if ($upRow>0){
            $upPage="<li><a href='".$url."&".$p."=$upRow'>".$this->config['prev']."</a></li>";
        }else{
            $upPage="<li  ><a href='".$url."&".$p."=$upRow'>".$this->config['prev']."</a></li>";
        }

        if ($downRow <= $this->totalPages){
            $downPage="<li><a href='".$url."&".$p."=$downRow'>".$this->config['next']."</a></li>";
        }else{
            $downPage="<li  ><a href='".$url."&".$p."=$downRow'>".$this->config['next']."</a></li>";
        }
        // << < > >>
        if($nowCoolPage == 1){
            $theFirst = "<li ><a href='".$url."&".$p."=1' >".$this->config['first']."</a></li>";;
            $prePage = "";
        }else{
            $preRow =  $this->nowPage-$this->rollPage;
            $prePage = "<a href='".$url."&".$p."=$preRow' > prev ".$this->rollPage."</a>";
            $theFirst = "<li><a href='".$url."&".$p."=1' >".$this->config['first']."</a></li>";
        }
        if($nowCoolPage == $this->coolPages){
            $theEndRow = $this->totalPages;
            $nextPage = "";
            $theEnd="<li ><a href='".$url."&".$p."=$theEndRow' >".$this->config['last']."</a></li>";
        }else{
            $nextRow = $this->nowPage+$this->rollPage;
            $theEndRow = $this->totalPages;
            $nextPage = "<a href='".$url."&".$p."=$nextRow' >next ".$this->rollPage."</a>";
            $theEnd = "<li><a href='".$url."&".$p."=$theEndRow' >".$this->config['last']."</a></li>";
        }


        // 1 2 3 4 5
        $linkPage = "";


        $cp=$this->nowPage;    //curent page count
        $tp=$this->totalPages;    //total page count
        $sp=$this->rollPage;   //show page count
        $cur_pc=$this->nowPage;

        $header="<li><a>".$this->nowPage."/".$this->totalPages."</a></li>";

        $bp=0;           //begin page count
        $ep=0;           //end page count
        if($sp%2==0) $sp=$sp+1;      //this process need an odd number
        $dp=floor($sp/2);  //each side count to show
        $dif=$tp-$sp;    //check weather it have enough page to make mid-show
        $f=$cp-$dp;      //to check weather it has enough page to make mid-show from the begin
        $g=$tp-($cp+$dp); //to check weather it has enough page to make mid-show from the end

        if($sp && $dif>=0)
        {
            if($g>0)
            {
                if($f>0)
                {
                    $bp=$f;
                    $ep=$cp+$dp;
                }
                else
                {
                    $bp=1;
                    $ep=2*$dp+1;
                }
            }
            else
            {
                $bp=$tp-2*$dp;
                $ep=$tp;
            }
        }
        else
        {
            $bp=1;
            $ep=$tp;
        }




        for($i=$bp;$i<=$ep;$i++)
        {
            if($i==$cur_pc)
            {
                $linkPage .= "<li  class='active'><a href='".$url."&".$p."=$i' title='".$i."'>".$i." </a></li>";

            }
            else
            {
                $linkPage .= "<li><a href='".$url."&".$p."=$i'  title='".$i."'>".$i."</a></li>";

            }
        }


        /*
        // 1 2 3 4 5
        $linkPage = "";
        for($i=1;$i<=$this->rollPage;$i++){
            $page=($nowCoolPage-1)*$this->rollPage+$i;
            if($page!=$this->nowPage){
                if($page<=$this->totalPages){
                    $linkPage .= "<a href='".$url."&".$p."=$page' class='number' title='".$page."'>".$page."</a>";
                }else{
                    break;
                }
            }else{
                if($this->totalPages != 1){
                    $linkPage .= "<a href='".$url."&".$p."=$page' class='number current' title='".$page."'>".$page."</a>";
                }
            }
        }
        */
        $pageStr	 =	 str_replace(
            array('%header%','%nowPage%','%totalRow%','%totalPage%','%upPage%','%downPage%','%first%','%prePage%','%linkPage%','%nextPage%','%end%'),
            array($header,$this->nowPage,$this->totalRows,$this->totalPages,$upPage,$downPage,$theFirst,$prePage,$linkPage,$nextPage,$theEnd),$this->config['theme']);
        return $pageStr;
    }


    public function showmenu() {
        if(0 == $this->totalRows) return '';
        $p = $this->pageNo;
        $nowCoolPage      = ceil($this->nowPage/$this->rollPage);
        $url  =  auto_charset($_SERVER['REQUEST_URI'].(strpos($_SERVER['REQUEST_URI'],'?')?'':"?").$this->parameter,'GBK','UTF8');

        $parse = parse_url($url);
        if(isset($parse['query'])) {
            parse_str($parse['query'],$params);
            unset($params[$p]);
            $url   =  $parse['path'].'?'.http_build_query($params);
        }

        $upRow   = $this->nowPage-1;
        $downRow = $this->nowPage+1;
        if ($upRow>0){
            $upPage="<span id ='pre' onClick='showmenu($upRow)' >&nbsp;</span>";
        }else{
            $upPage="";
        }

        if ($downRow <= $this->totalPages){
            $downPage="<span id ='next' onClick='showmenu($downRow)' >&nbsp;</span>";
        }else{
            $downPage="";
        }


        $pageStr	 =	 $upPage.$downPage;
        return $pageStr;
    }

}
?>