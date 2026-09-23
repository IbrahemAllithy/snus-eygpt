<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>محتوى الموقع</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root { --gold: #C19A49; --ink: #172033; --muted: #667085; --line: #e6e8ee; --bg: #f6f7fb; }
        * { box-sizing: border-box; }
        body { margin: 0; font-family: Cairo, sans-serif; background: var(--bg); color: var(--ink); }
        header { display: block; padding: 24px 28px; background: #111827; color: #fff; text-align: right; }
        header h1 { margin: 0; font-size: 1.5rem; }
        header p { margin: 8px 0 0; color: #cbd5e1; font-size: 1rem; line-height: 1.7; }
        #logout { float: left; }
        button, .btn { border: 0; border-radius: 10px; background: var(--gold); color: #111; font: inherit; font-weight: 700; padding: 10px 16px; cursor: pointer; }
        button.ghost { background: transparent; color: #fff; border: 1px solid rgba(255,255,255,.3); }
        main { max-width: 980px; margin: 0 auto; padding: 28px 16px 80px; }
        .card { background: #fff; border: 1px solid var(--line); border-radius: 16px; padding: 20px; margin-bottom: 18px; }
        .login { max-width: 420px; margin: 48px auto; }
        label { display: block; font-weight: 700; margin: 12px 0 6px; }
        input, textarea { width: 100%; border: 1px solid var(--line); border-radius: 10px; padding: 12px; font: inherit; }
        textarea { min-height: 90px; }
        .hint { color: var(--muted); font-size: .85rem; margin-top: 6px; }
        .group-title { margin: 28px 0 12px; font-size: 1.35rem; }
        .row { border: 1px solid var(--line); border-radius: 12px; padding: 14px; margin-top: 12px; background: #fbfbfd; }
        .row-head { display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px; }
        .danger { background: #fee2e2; color: #991b1b; }
        .status { min-height: 1.2em; margin-top: 10px; color: #067647; }
        .status.error { color: #b42318; }
        .preview { width: 120px; height: 72px; object-fit: cover; border-radius: 8px; margin-top: 8px; background: #eee; }
        .actions { display: flex; gap: 8px; flex-wrap: wrap; margin-top: 10px; }
        .hidden { display: none; }
    </style>
</head>
<body>
    <header>
        <div>
            <h1>محتوى الموقع</h1>
            <p>نفس البيانات التي يقرأها المتجر، ويمكن لأي داشبورد حفظها من واجهة الإدارة.</p>
        </div>
        <button id="logout" class="ghost hidden" type="button">خروج</button>
    </header>
    <main>
        <form id="login" class="card login">
            <h2>دخول الإدارة</h2>
            <label for="email">البريد</label>
            <input id="email" type="email" required autocomplete="username">
            <label for="password">كلمة المرور</label>
            <input id="password" type="password" required autocomplete="current-password">
            <div class="actions"><button type="submit">دخول</button></div>
            <div id="login-status" class="status"></div>
        </form>
        <form id="editor" class="hidden">
            <div id="groups"></div>
            <div class="actions"><button type="submit">حفظ المحتوى</button></div>
            <div id="save-status" class="status"></div>
        </form>
    </main>
    <script>
        const tokenKey = 'token';
        const loginForm = document.getElementById('login');
        const editor = document.getElementById('editor');
        const groupsEl = document.getElementById('groups');
        let content = [];

        function token() {
            return localStorage.getItem(tokenKey) || '';
        }

        function authHeaders(extra = {}) {
            return { Authorization: 'Bearer ' + token(), Accept: 'application/json', ...extra };
        }

        function showStatus(el, message, isError) {
            el.textContent = message;
            el.classList.toggle('error', !!isError);
        }

        function imageUrl(path) {
            if (!path) return '';
            if (/^https?:\/\//i.test(path)) return path;
            return '/' + path.replace(/^\/+/, '');
        }

        function fieldInput(field, value, key, scope, index) {
            const attrs = `data-key="${escapeAttr(key)}" data-scope="${scope}" data-index="${index}" data-field="${field.key}"`;
            const input = field.type === 'textarea'
                ? `<textarea ${attrs}>${escapeHtml(value || '')}</textarea>`
                : `<input ${attrs} value="${escapeAttr(value || '')}">`;
            const preview = field.type === 'image' && value
                ? `<img class="preview" src="${escapeAttr(imageUrl(value))}" alt="">`
                : '';
            const upload = field.type === 'image'
                ? `<div class="actions"><input type="file" accept="image/*" data-upload="1" ${attrs}></div>`
                : '';
            return `<label>${field.label}</label>${input}${preview}${upload}`;
        }

        function escapeHtml(value) {
            return String(value).replace(/[&<>]/g, (char) => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;' }[char]));
        }

        function escapeAttr(value) {
            return escapeHtml(value).replace(/"/g, '&quot;');
        }

        function renderList(item, rows, scope, allowRemove) {
            return rows.map((row, index) => `
                <div class="row">
                    <div class="row-head"><strong>عنصر ${index + 1}</strong>${allowRemove ? `<button type="button" class="danger" data-remove="1" data-key="${escapeAttr(item.key)}" data-scope="${scope}" data-index="${index}">حذف</button>` : ''}</div>
                    ${item.item_fields.map((field) => fieldInput(field, row[field.key], item.key, scope, index)).join('')}
                </div>
            `).join('') + (allowRemove ? `<div class="actions"><button type="button" data-add="1" data-key="${escapeAttr(item.key)}" data-scope="${scope}">إضافة</button></div>` : '');
        }

        function render() {
            groupsEl.innerHTML = content.map((group) => `
                <h2 class="group-title">${escapeHtml(group.label)}</h2>
                ${group.items.map((item) => {
                    let body = '';
                    if (item.type === 'textarea') {
                        body = `<textarea data-key="${item.key}">${escapeHtml(item.value || '')}</textarea>`;
                    } else if (item.type === 'text') {
                        body = `<input data-key="${item.key}" value="${escapeAttr(item.value || '')}">`;
                    } else if (item.type === 'list') {
                        body = renderList(item, item.value || [], 'list', true);
                    } else if (item.type === 'mosaic') {
                        body = `<h3>البانر الكبير</h3>${renderList(item, [item.value.large || {}], 'large', false)}<h3>البانرات الصغيرة</h3>${renderList(item, item.value.items || [], 'items', true)}`;
                    }
                    return `<section class="card"><h3>${escapeHtml(item.label)}</h3>${item.hint ? `<p class="hint">${escapeHtml(item.hint)}</p>` : ''}${body}</section>`;
                }).join('')}
            `).join('');
        }

        function blankRow(fields) {
            return Object.fromEntries(fields.map((field) => [field.key, '']));
        }

        function itemByKey(key) {
            return content.flatMap((group) => group.items).find((item) => item.key === key);
        }

        function rowTarget(item, scope, index) {
            if (scope === 'large') return item.value.large;
            if (scope === 'items') return item.value.items[index];
            return item.value[index];
        }

        function writeField(key, scope, index, field, value) {
            const item = itemByKey(key);
            const target = item ? rowTarget(item, scope, Number(index)) : null;
            if (target) target[field] = value;
        }

        async function loadContent() {
            const response = await fetch('/api/admin/site-content', { headers: authHeaders() });
            if (response.status === 401) {
                localStorage.removeItem(tokenKey);
                showLogin();
                return;
            }
            const json = await response.json();
            content = json.data.groups;
            loginForm.classList.add('hidden');
            editor.classList.remove('hidden');
            document.getElementById('logout').classList.remove('hidden');
            render();
        }

        function showLogin() {
            loginForm.classList.remove('hidden');
            editor.classList.add('hidden');
            document.getElementById('logout').classList.add('hidden');
        }

        loginForm.addEventListener('submit', async (event) => {
            event.preventDefault();
            showStatus(document.getElementById('login-status'), 'جارٍ الدخول...', false);
            const response = await fetch('/api/login', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', Accept: 'application/json' },
                body: JSON.stringify({
                    email: document.getElementById('email').value,
                    password: document.getElementById('password').value,
                }),
            });
            const json = await response.json();
            if (!response.ok || !json.token) {
                showStatus(document.getElementById('login-status'), json.message || 'تعذر الدخول', true);
                return;
            }
            localStorage.setItem(tokenKey, json.token);
            localStorage.setItem('loggedIn', 'true');
            loadContent();
        });

        document.getElementById('logout').addEventListener('click', () => {
            localStorage.removeItem(tokenKey);
            showLogin();
        });

        groupsEl.addEventListener('click', (event) => {
            const add = event.target.closest('[data-add]');
            const remove = event.target.closest('[data-remove]');
            if (add) {
                const item = itemByKey(add.dataset.key);
                const row = blankRow(item.item_fields);
                if (add.dataset.scope === 'items') item.value.items.push(row);
                else item.value.push(row);
                render();
            }
            if (remove) {
                const item = itemByKey(remove.dataset.key);
                const index = Number(remove.dataset.index);
                if (remove.dataset.scope === 'items') item.value.items.splice(index, 1);
                else item.value.splice(index, 1);
                render();
            }
        });

        groupsEl.addEventListener('input', (event) => {
            const target = event.target;
            if (target.dataset.field) {
                writeField(target.dataset.key, target.dataset.scope, target.dataset.index, target.dataset.field, target.value);
                return;
            }
            if (target.dataset.key && itemByKey(target.dataset.key)) {
                itemByKey(target.dataset.key).value = target.value;
            }
        });

        groupsEl.addEventListener('change', async (event) => {
            const input = event.target;
            if (!input.dataset.upload || !input.files || !input.files[0]) return;
            const body = new FormData();
            body.append('file', input.files[0]);
            const response = await fetch('/api/admin/site-content/upload', { method: 'POST', headers: authHeaders(), body });
            const json = await response.json();
            if (!response.ok) {
                showStatus(document.getElementById('save-status'), json.message || 'تعذر رفع الصورة', true);
                return;
            }
            writeField(input.dataset.key, input.dataset.scope, input.dataset.index, input.dataset.field, json.data.path);
            render();
        });

        editor.addEventListener('submit', async (event) => {
            event.preventDefault();
            const items = content.flatMap((group) => group.items).map((item) => ({ key: item.key, value: item.value }));
            showStatus(document.getElementById('save-status'), 'جارٍ الحفظ...', false);
            const response = await fetch('/api/admin/site-content', {
                method: 'PUT',
                headers: authHeaders({ 'Content-Type': 'application/json' }),
                body: JSON.stringify({ items }),
            });
            const json = await response.json();
            if (!response.ok) {
                showStatus(document.getElementById('save-status'), json.message || 'تعذر الحفظ', true);
                return;
            }
            content = json.data.groups;
            render();
            showStatus(document.getElementById('save-status'), 'تم الحفظ. حدّث الصفحة الرئيسية لترى التغيير.', false);
        });

        if (token()) loadContent();
    </script>
</body>
</html>
