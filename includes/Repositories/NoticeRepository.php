<?php

namespace LTucillo\Repositories;

use LTucillo\Entities\Notice;

/**
 * Class NoticeRepository
 * @package LTucillo\Repositories
 */
class NoticeRepository
{
    const TABLE = 'fixed_notices';

    /**
     * @param Notice $notice
     * @return Notice
     */
    static public function save(Notice $notice)
    {
        global $wpdb;

        $data = $notice->toArray();
        $data['user_group'] = implode(',', $data['user_group']);

        if ($notice->getId()) {
            $wpdb->update(
                $wpdb->prefix . self::TABLE,
                $data,
                ['id' => $notice->getId()]
            );

            return $notice;
        }

        $wpdb->insert($wpdb->prefix . self::TABLE, $data);

        return new Notice(
            $notice->getUserGroup(),
            $notice->getLevel(),
            $notice->getMessage(),
            $wpdb->insert_id
        );
    }

    /**
     * @param $id
     * @return Notice|null
     */
    static public function load($id)
    {
        global $wpdb;

        $result = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM " . $wpdb->prefix . self::TABLE . " WHERE id = %d",
                $id
            )
        );

        foreach ($result as $item) {
            return new Notice(
                explode(',', $item->user_group),
                $item->level,
                $item->message,
                $item->id
            );
        }

        return null;
    }

    /**
     * @param $userGroup
     * @return array
     */
    static public function byUserGroup($userGroup)
    {
        $all = self::all();
        $return = [];

        /** @var Notice $notice */
        foreach ($all as $notice) {
            if (in_array($userGroup,$notice->getUserGroup())) {
                $return[] = $notice;
            }
        }

        return $return;
    }

    /**
     * @return array
     */
    static public function all()
    {
        global $wpdb;

        $result = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . self::TABLE);

        return self::prepareCollection($result);
    }

    /**
     * @param Notice $notice
     */
    static public function delete(Notice $notice)
    {
        global $wpdb;
        $wpdb->query($wpdb->prepare("DELETE FROM " . $wpdb->prefix . self::TABLE . " WHERE id = %d", $notice->getId()));
    }

    /**
     * @param array $data
     * @return array
     */
    static private function prepareCollection(array $data)
    {
        $return = [];
        foreach ($data as $item) {
            if ($item instanceof \stdClass) {
                $item = (array) $item;
            }

            $return[] = new Notice(
                is_array($item['user_group']) ? $item['user_group'] : explode(',', $item['user_group']),
                $item['level'],
                $item['message'],
                $item['id']
            );
        }

        return $return;
    }
}
