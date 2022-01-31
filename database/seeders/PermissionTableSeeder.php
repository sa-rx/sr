<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

        'الاصناف',
            'اضافة صنف',
            'حذف صنف',
            'تعديل صنف',
            'عرض صنف',


        'الفئات',
            'اضافة فئه',
            'حذف فئه',
            'تعديل فئه',
            'عرض فئه',





        'العروض',
            'اضافة عرض',
            'حذف عرض',
            'تعديل عرض',
            'اظهار العرض',

        'الطلبات',
            'حذف طلب',
            'تعديل طلب',
            'اظهار طلب',


            'عن الكافيه',
            'تعديل صفحة عن الكافيه',

        'تواصل معنا',
            'حذف الرسايل في صفحة تواصل معنا',
            'عرض الرسايل  في صفحة تواصل معنا',


            'الاراء',
            'حذف الرسايل  في صفحة  الاراء',

        'المستخدمين',
            'اضافة مستخدم',
            'حذف مستخدم',
            'تعديل مستخدم',

        'صلاحيات المستخدمين',
            'عرض صلاحيه',
            'اضافة صلاحيه',
            'حذف صلاحيه',
            'تعديل صلاحيه',

            'لوحة التحكم'

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

    }
}
