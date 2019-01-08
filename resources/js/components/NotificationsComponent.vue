<template>
    <li class="dropdown notifications-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning">10</span>
        </a>
        <ul class="dropdown-menu">
            <li class="header">You have 10 notifications</li>
            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                    <li>
                        <a href="#">
                            <i class="fa fa-warning text-aqua"></i> 5 new members joined today
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into
                            the
                            page and may cause design problems
                        </a>
                    </li>
                    <li v-for="name in names">
                        <a href="#">
                            <i class="fa fa-warning text-red"></i> {{ name }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="footer"><a href="#">View all</a></li>
        </ul>
    </li>
</template>

<script>
    export default {
        name: "NotificationsComponent",
        data() {
            return {
                names: []
            }
        },
        mounted() {
            let that = this
            // 12. 创建 Echo 监听
            Echo.channel('rss')
                .listen('RssCreatedEvent', (e) => {
                    that.names.push(e.message)
                });
        }
    }
</script>

<style scoped>

</style>