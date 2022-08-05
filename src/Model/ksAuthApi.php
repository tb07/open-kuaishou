<?php

namespace Tb07\OpenKuaiShou\Model;


/**
 * 需要授权开放api
 * Class ksAuthApi
 * @package Tb07\OpenKuaiShou
 */
class ksAuthApi extends Module
{
    //获取商家信息
    public function openUserSeller(array $params, string $accessToken)
    {
        $response = $this->app->http->exec("GET", 'open.user.seller.get', $params, $accessToken);
        return $response;
    }


    /**
     * 团长查询招商活动列表
     *  * $params['activityRuleSet']               = ({})           非必填     招商活动规则信息
     *            ['activityEndTime']              = (Long)         非必填     活动结束时间（毫秒）
     *            ['activityType']                 = (Integer)      非必填      每页数量
     *            ['activityExclusiveUser']        = (List<Long>)   非必填      活动id
     *            ['activityBeginTime']            = (Long)         非必填      频道ID
     *            ['activityStatus']               = (Integer)      非必填      活动状态
     *            ['activityTitle']                = (String)       非必填      活动标题
     *            ['activityExclusiveUserKwaiId']  = (List<String>) 非必填      活动标题
     * @param array $params
     * @param string $accessToken
     * @return mixed|void
     */
    public function investmentActivityOpenCreate(array $params, string $accessToken)
    {
        $response = $this->app->http->exec("GET", 'open.distribution.investment.activity.open.create', $params, $accessToken);
        return $response;
    }

    /**
     * 团长查询招商活动列表
     *  * $params['activityType']         = (Integer)    非必填     活动类型
     *            ['offset']              = (Integer)   非必填      分页偏移量（limit字段整数倍）
     *            ['limit']               = (Integer)   必填        每页数量
     *            ['activityId']          = (Long)      非必填      活动id
     *            ['channelId']           = (ListLong)  非必填      频道ID
     *            ['activityStatus']      = (Integer)   非必填      活动状态
     *            ['activityTitle']       = (String)    非必填      活动标题
     * @param array $params
     * @param string $accessToken
     * @return mixed|void
     */
    public function investmentActivityOpenList(array $params, string $accessToken)
    {
        $response = $this->app->http->exec("GET", 'open.distribution.investment.activity.open.list', $params, $accessToken);
        return $response;
    }

    /**
     * 获取活动详情
     *  * $params['activityId']          = (Long)      必填      活动id
     * @param array $params
     * @param string $accessToken
     * @return mixed|void
     */
    public function investmentActivityOpenInfo(array $params, string $accessToken)
    {
        $response = $this->app->http->exec("GET", 'open.distribution.investment.activity.open.info', $params, $accessToken);
        return $response;
    }

    /**
     * 团长招商活动已报名商品列表
     *  * $params['itemAuditStatus']      = (Integer)   非必填      商品审核状态
     *            ['categoryId']          = (Long)      非必填      类目ID
     *            ['offset']              = (Integer)   非必填      分页偏移量（limit字段整数倍）
     *            ['limit']               = (Integer)   必填        每页数量
     *            ['activityId']          = (Long)      必须        活动id
     *            ['itemId']              = (Long)      非必填      商品ID
     *            ['distributeSellerId']  = (string)    非必填      卖家id
     *            ['itemTitle']           = (String)    非必填      商品标题
     *
     * @param array $params
     * @param string $accessToken
     * @return mixed|void
     */
    public function investmentActivityOpenGoodsList(array $params, string $accessToken)
    {
        $response = $this->app->http->exec("GET", 'open.distribution.investment.activity.open.item.list', $params, $accessToken);
        return $response;
    }

    /**
     * 团长审核活动报名商品
     *  * $params['itemAuditStatus']      = (Integer)    必填      审核状态，2：通过；3：不通过
     *            ['itemId']             = (List<Long>)  必填      商品id
     *            ['activityId']         = (Long)        必填      活动id
     *
     * @param array $params
     * @param string $accessToken
     * @return mixed|void
     */
    public function investmentActivityOpenGoodsAudit(array $params, string $accessToken)
    {
        $response = $this->app->http->exec("GET", 'open.distribution.investment.activity.open.item.audit', $params, $accessToken);
        return $response;
    }

    /**
     * 招商活动商品推广效果
     *  * $params['pageCursor']      = (Integer)     非必填    分页游标
     *            ['itemId']         = (Long)        非必填    商品id
     *            ['activityId']     = (Long)        必填      活动id
     *            ['endTime']        = (Long)        非必填    结束时间
     *            ['itemTitle']      = (Long)        非必填    商品标题
     *            ['pageSize']       = (Long)        必填      每页大小
     *
     * @param array $params
     * @param string $accessToken
     * @return mixed|void
     */
    public function investmentActivityOpenGoodsPromotionEffect(array $params, string $accessToken)
    {
        $response = $this->app->http->exec("GET", 'open.distribution.investment.activity.open.promotion.effect', $params, $accessToken);
        return $response;
    }

    /**
     * 分销团长订单列表(游标方式)
     *  * $params['sortType']         = (Integer)     必填    排序类型 [1:按指定查询类型降序] [2:按指定查询类型升序]
     *            ['queryType']       = (Integer)     必填    查询类型 [1:按分销订单创建时间查询] [2:按分销订单更新时间查询][4:按订单实际创建时间查询]
     *            ['cpsOrderStatus']  = (Integer)     必填    分销订单状态 [0:全部订单] [30:已付款] [50:已收货] [60:已结算] [80:已失效]
     *            ['distributorId']   = (Long)        必填    达人ID [0:全部达人]
     *            ['beginTime']       = (Long)        必填    起始时间(单位: 毫秒， 起始时间为90天内，且订单时间跨度不超过7天)
     *            ['endTime']         = (Long)        必填    结束时间(单位: 毫秒)
     *            ['pcursor']         = (String)      非必填  分销订单位点游标(下一次请求透传，返回"nomore"标识为结束)
     *            ['pageize']         = (Integer)     必填    页面大小[最大不超过100]
     *
     * @param array $params
     * @param string $accessToken
     * @return mixed|void
     */
    public function cpsOrderCursorList(array $params, string $accessToken)
    {
        $response = $this->app->http->exec("GET", 'open.distribution.cps.leader.order.cursor.list', $params, $accessToken);
        return $response;
    }
    /**
     * 分销团长订单列表(游标方式)
     *  * $params['distributorId']  = (Number)     非必填    排序类型 分销者ID
     *            ['orderId']       = (Number)     必填      订单ID
     *
     * @param array $params
     * @param string $accessToken
     * @return mixed|void
     */
    public function sellerOrderCpsDetail(array $params, string $accessToken)
    {
        $response = $this->app->http->exec("GET", 'open.seller.order.cps.detail', $params, $accessToken);
        return $response;
    }


}