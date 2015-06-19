<?php

namespace Main\CTL;


use Main\Context\Context;
use Main\DB\Medoo\MedooFactory;
use Main\Http\RequestInfo;
use Main\View\HtmlView;
use Main\View\JsonView;
use Main\ThirdParty\Xcrud\Xcrud;

/**
 * @Restful
 * @uri /
 */
class GameCTL extends BaseCTL
{

    /**
     * @GET
     */
    public function index()
    {
        $arr = array();
        $arr['test'] = "test";
        return new JsonView($arr);
    }

    /**
     * @uri signup
     * @GET
     */
    public function signup()
    {
        $username = $this->reqInfo->param('username');
        $password = $this->reqInfo->param('password');
        $db = MedooFactory::getInstance();
        $arr = array();

        if (!$db->get('account', '*', array('AND' => array('username' => $username)))) {
            $arr['acoount_id'] = $db->insert('account', array('username' => $username, 'password' => $password));
            $arr['status'] = 'success';
        } else {
            $arr['status'] = 'error';
            $arr['text'] = 'username นี้มีในระบบแล้ว';
        }

        return new JsonView($arr);
    }

    /**
     * @uri login
     * @GET
     */
    public function login()
    {
        $username = $this->reqInfo->param('username');
        $password = $this->reqInfo->param('password');
        $db = MedooFactory::getInstance();
        $arr = array();
        if ($db->get('account', '*', array('AND' => array('username' => $username, 'password' => $password)))) {
            $arr['data'] = $db->get('account', '*', array('AND' => array('username' => $username, 'password' => $password)));
            unset($arr['data']['password']);
            $arr['status'] = 'success';
        } else {
            $arr['status'] = 'error';
            $arr['text'] = 'username or password ผิด';
        }
        return new JsonView($arr);
    }

    /**
     * @uri savescore
     * @GET
     */
    public function score()
    {
        $account_id = $this->reqInfo->param('acc');
        $score = $this->reqInfo->param('score');
        $db = MedooFactory::getInstance();
        $arr = array();
        $arr['aa'] = $account_id;
        $arr['score'] = $score;
        if ($db->get('account_score', '*', array('AND' => array('account_id' => $account_id)))) {
            $db->update('account_score', ['score' => $score], ['account_id =' => $account_id]);
            $arr['status'] = 'success';
        } else {
            if ($db->insert('account_score', array('account_id' => $account_id, 'score' => $score))) {
                $arr['status'] = 'success';

            } else {
                $arr['status'] = 'error';

            }
        }

        return new JsonView($arr);
    }

    /**
     * @uri pickitem
     * @GET
     */
    public function item()
    {
        $account_id = $this->reqInfo->param('account_id');
        $item_id = $this->reqInfo->param('item_id');
        $item_count = $this->reqInfo->param('item_count');
        $arr = array();
        $db = MedooFactory::getInstance();
        $arr['account_id'] = $account_id;
        $arr['item_id']= $item_id;
        $arr['item_count'] = $item_count;
        if($db->get('account_item','*',array('AND'=> array('item_id' => $item_id, 'account_id' => $account_id)))) {
            $db->update('account_item', ['item_count' => $item_count], array('AND' => array('account_id' => $account_id, 'item_id' => $item_id)));
            $arr['status'] = 'success';
        }
        else{
            if($db->insert('account_item', array('item_id' => $item_id, 'item_count' => $item_count, 'account_id' => $account_id))) {
                $arr['status'] = 'success';
            }else{
                $arr['status'] = 'error';
            }

        }
        return new JsonView($arr);
    }

    /**
     * @uri forgotpass
     * @GET
     */
    public function forgotpassword()
    {
        $username = $this->reqInfo->param('username');
        $arr = array();
        $db = MedooFactory::getInstance();
        if($db->get('account','*',array('AND'=> array('username' => $username)))){
            $arr['data'] = $db->get('account', '*', array('AND' => array('username' => $username)));
            $arr['status'] = 'success';
        }
        else{
            $arr['status'] = 'error';
            $arr['text'] = 'no username';
        }
        return new JsonView($arr);
    }
    /**
     * @GET
     * @uri change_password
     */
    public function changepassword () {
        $db = MedooFactory::getInstance();
        return new JsonView(["status"=> $db->update('account', ['password' => $this->reqInfo->param('password')], array('AND' => array('id' => $this->reqInfo->param('account_id'))))]);
    }
}