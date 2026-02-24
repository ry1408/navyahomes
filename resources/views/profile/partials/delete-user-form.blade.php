<section>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .delete-button {
            background: linear-gradient(135deg, #EF4444, #DC2626);
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .delete-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(239, 68, 68, 0.3);
        }

        .cancel-button {
            background: #F3F4F6;
            color: #374151;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.2s ease;
            border: 1px solid #E5E7EB;
            cursor: pointer;
        }

        .dark .cancel-button {
            background: #374151;
            color: #F3F4F6;
            border-color: #4B5563;
        }

        .cancel-button:hover {
            background: #E5E7EB;
        }

        .dark .cancel-button:hover {
            background: #4B5563;
        }

        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 50;
        }

        .modal-content {
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 90%;
            padding: 32px;
            animation: fadeIn 0.3s ease-out;
        }

        .dark .modal-content {
            background: #1F2937;
        }

        .modal-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 16px;
            color: #EF4444;
        }

        .dark .modal-title {
            color: #FCA5A5;
        }

        .modal-text {
            font-size: 0.875rem;
            color: #6B7280;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .dark .modal-text {
            color: #D1D5DB;
        }

        .form-input {
            transition: all 0.3s ease;
            width: 100%;
            padding: 10px 12px;
            border: 2px solid #E5E7EB;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .dark .form-input {
            background: #374151;
            border-color: #4B5563;
            color: white;
        }

        .form-input:focus {
            outline: none;
            border-color: #EF4444;
            box-shadow: 0 0 15px rgba(239, 68, 68, 0.2);
        }

        .modal-buttons {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
        }

        .warning-box {
            background: #FEE2E2;
            border-left: 4px solid #EF4444;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 16px;
            color: #7F1D1D;
        }

        .dark .warning-box {
            background: #7F1D1D;
            color: #FECACA;
        }
    </style>

    <div class="animate-fade-in">
        <div class="warning-box">
            <p class="font-semibold">⚠️ Warning: This action cannot be undone</p>
            <p class="text-sm mt-2">Deleting your account will permanently remove all your data including projects, plots, and profile information.</p>
        </div>

        <p class="text-gray-600 dark:text-gray-400 mb-6 text-sm leading-relaxed">
            Once your account is deleted, all of its resources and data will be permanently deleted. Before proceeding, please download any important data you wish to keep.
        </p>

        <button
            onclick="document.getElementById('delete-modal').style.display='flex'"
            class="delete-button"
        >
            🗑️ Delete Account Permanently
        </button>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="delete-modal" style="display: none;" class="modal-overlay">
        <div class="modal-content">
            <h2 class="modal-title">🚨 Delete Account?</h2>
            <p class="modal-text">
                This will permanently delete your account and all associated data. This action cannot be reversed.
            </p>

            <form method="post" action="{{ route('profile.destroy') }}" class="mt-6">
                @csrf
                @method('delete')

                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                    Enter your password to confirm:
                </label>
                <input
                    type="password"
                    name="password"
                    placeholder="Your password"
                    class="form-input"
                    required
                />

                @if ($errors->userDeletion->has('password'))
                    @foreach ($errors->userDeletion->get('password') as $message)
                        <p class="text-red-500 dark:text-red-400 text-sm mb-4">{{ $message }}</p>
                    @endforeach
                @endif

                <div class="modal-buttons">
                    <button
                        type="button"
                        onclick="document.getElementById('delete-modal').style.display='none'"
                        class="cancel-button"
                    >
                        Cancel
                    </button>
                    <button type="submit" class="delete-button">
                        Yes, Delete Permanently
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Close modal when clicking outside
        document.getElementById('delete-modal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                this.style.display = 'none';
            }
        });
    </script>
</section>
