</td>
<td width="30%" class="sidebar">
    <div class="sidebarHeader"> Меню</div>
    <ul>
        <li><a href="/">Главная страница</a></li>
        <li><a href="/about-me">Обо мне</a></li>
        <?php if (!empty($user) and $user->getRole() === 'admin'): ?>
            <li><a href="/admin">Админка</a></li>
        <?php endif; ?>
    </ul>
</td>
</tr>
<tr>
    <td class="footer" colspan="2">Все права защищены (с) Мой блог</td>
</tr>
</table>
</body>
</html>