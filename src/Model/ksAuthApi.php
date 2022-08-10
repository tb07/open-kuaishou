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
     * 团长创建招商活动接口
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
     *  * $params['activityType']         = (Integer)   非必填     活动类型
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
     * 分销团长订单详情(游标方式)
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

    ############# 二级团长数据接口开始  #############

    /**
     * 报名二级团长招商活动
     *    $params['itemId']                     = (Long[])    必填      商品ID数组
     *            ['activityId']                = (Long)      必填      报名的活动ID
     *            ['preActivityId']             = (Long)      必填      该商品上一级活动ID
     *            ['investmentPromotionRate']   = (Integer)   必填      服务费率，千分制 100->10%，报名的服务费率不能低于当前报名活动的最低要求服务费率，不能大于该商品一级活动的服务费率
     *
     * @param array $params
     * @param string $accessToken
     * @return mixed|void
     */
    public function applySecondInvestmentActivity(array $params, string $accessToken)
    {
        $response = $this->app->http->exec("GET", 'open.distribution.second.action.apply.investment.activity', $params, $accessToken);
        return $response;
    }

    /**
     * 取消报名二级团长招商活动商品
     *    $params['itemId']                     = (Long)    必填      商品ID数组
     *           ['activityId']                = (Long)     必填      报名的活动ID
     *           ['preActivityId']             = (Long)     必填      该商品上一级活动ID
     *
     * @param array $params
     * @param string $accessToken
     * @return mixed|void
     */
    public function cancelApplySecondInvestmentActivity(array $params, string $accessToken)
    {
        $response = $this->app->http->exec("GET", 'open.distribution.second.action.cancel.cooperation', $params, $accessToken);
        return $response;
    }

    /**
     * 修改报名二级团长招商活动商品服务费率
     *    $params['itemId']                    = (Long)     必填      商品ID数组
     *           ['activityId']                = (Long)     必填      报名的活动ID
     *           ['preActivityId']             = (Long)     必填      该商品上一级活动ID
     *           ['itemCommissionRate']        = (Integer)  非必填    (扩展需要，目前无作用)佣金费率，千分制，100->10%
     *           ['investmentPromotionRate']   = (Integer)  必填      服务费率，千分制100->10%，服务费率不能小于当前报名二级活动要求的最低服务费率，不能大于该商品的一级活动服务费率
     *
     * @param array $params
     * @param string $accessToken
     * @return mixed|void
     */
    public function editApplySecondInvestmentActivityGoodsCommissionRate(array $params, string $accessToken)
    {
        $response = $this->app->http->exec("GET", 'open.distribution.second.action.edit.apply.investment.activity', $params, $accessToken);
        return $response;
    }

    /**
     * 二级团长审核一级团长对某商品取消推广的申请
     *    $params['itemId']                    = (Long)     必填      商品ID数组
     *           ['firstActivityUserId']       = (Long)     非必填    提出申请的一级团长的ID
     *           ['activityId']                = (Long)     必填      报名的二级活动ID
     *           ['preActivityId']             = (Long)     必填      该商品上一级活动ID
     *           ['itemAction']                = (Integer)  必填      商品操作：在此接口中只能填4与5 4-不同意取消推广 5-同意取消推广
     *
     * @param array $params
     * @param string $accessToken
     * @return mixed|void
     */
    public function auditApplyCancelSecondCooperationGoods(array $params, string $accessToken)
    {
        $response = $this->app->http->exec("GET", 'open.distribution.second.action.handle.cooperation', $params, $accessToken);
        return $response;
    }

    /**
     * 二级团长活动列表
     *    $params['activityType']         = (Integer)   必填      活动类型 1-普通，2-专属
     *            ['offset']              = (Integer)   必填      分页偏移量（limit字段整数倍）
     *            ['limit']               = (Integer)   必填      每页数量
     *            ['activityId']          = (Long)      非必填     活动id
     *
     * @param array $params
     * @param string $accessToken
     * @return mixed|void
     */
    public function secondInvestmentActivityOpenList(array $params, string $accessToken)
    {
        $response = $this->app->http->exec("GET", 'open.distribution.second.apply.investment.activity.item.list', $params, $accessToken);
        return $response;
    }

    /**
     * 报名二级团长商品列表
     *    $params['itemTitle']           = (String)     非必填      活动标题
     *            ['itemId']             = (Long)       非必填      商品ID
     *            ['itemAuditStatus']    = (Integer)    非必填      审核状态
     *            ['categoryId']         = (Long)       非必填      类目ID
     *            ['activityUserId']     = (Long)       非必填      创建该活动团长ID
     *            ['source']             = (Integer)    必填        用户源 0——团长，1——商家，该接口为团长专用接口，强制填参数0，传其它参数返回结果无权限
     *            ['queryScene']         = (Integer)    非必填      查询场景(扩展使用，无效参数)
     *            ['itemIds']            = (Long[])     非必填      商品ID数组
     *            ['preActivityUserId']  = (Integer)    非必填      商品报名的一级活动团长ID
     *            ['offset']             = (Integer)    必填       游标
     *            ['limit']              = (Integer)    必填        每页数量
     *            ['activityId']         = (Long)       必须        活动id
     * @param array $params
     * @param string $accessToken
     * @return mixed|void
     */
    public function secondInvestmentActivityOpenGoodsList(array $params, string $accessToken)
    {
        $response = $this->app->http->exec("GET", 'open.distribution.second.apply.investment.activity.item.list', $params, $accessToken);
        return $response;
    }

    /**
     * 一级团长可报名的招商活动列表
     *  * $params['investmentSource']         = (String)     必填        用户源 0-团长，1-商家。该接口为团长专用接口，强制填参数0，其它参数返回无权限提示。
     *            ['activityTitle']           = (String)     非必填      活动标题
     *            ['activityType']            = (Integer)    必填        活动类型 1-普通活动，2-专属活动。目前只支持报名普通活动。入参1与入参2效果一致。建议填入参1
     *            ['activity_status']         = (Integer)    非必填      活动状态 1-未发布，2-已发布，3-推广中，4已失效，5-已删除
     *            ['channelId']               = (Long[])     非必填      前台类目集合
     *            ['offset']                  = (Integer)    必填        游标
     *            ['limit']                   = (Integer)    必填        页大小
     *            ['activityId']              = (Long)       非必填      活动ID
     *            ['createActivityUserId']    = (Long)       非必填      创建该活动的团长ID
     * @param array $params
     * @param string $accessToken
     * @return mixed|void
     */
    public function canSecondApplyActivityList(array $params, string $accessToken)
    {
        $response = $this->app->http->exec("GET", 'open.distribution.second.investment.activity.list', $params, $accessToken);
        return $response;
    }

    /**
     * 一级团长查看能够报名招商活动的商品
     *  * $params['temTitle']               = (String)     非必填      活动标题
     *            ['itemId']                = (Long)       非必填      商品ID
     *            ['itemAuditStatus']       = (Integer)    非必填      审核状态
     *            ['categoryId']            = (Integer)    非必填      类目ID
     *            ['queryScene']            = (Integer)    非必填      查询场景
     *            ['item_ids']              = (Long[])     非必填      商品ID数组
     *            ['preActivityUserId']     = (Long)       非必填      商品报名的一级活动团长ID
     *            ['offset']                = (Integer)    必填        游标
     *            ['limit']                 = (Integer)    必填        页大小
     *            ['activityId']            = (Long)       必填        活动ID
     * @param array $params
     * @param string $accessToken
     * @return mixed|void
     */
    public function canSecondApplyGoodsList(array $params, string $accessToken)
    {
        $response = $this->app->http->exec("GET", 'open.distribution.second.allow.investment.activity.item.list', $params, $accessToken);
        return $response;
    }

    ############# 二级团长数据接口结束  #############

}